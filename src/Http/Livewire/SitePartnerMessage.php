<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartnerMessage extends Component
{
    use WithFileUploads;

    //public $partners = [];
    // public $like_count = 0;
    public $partner_id;
    public $user_id;
    public $messageText;
    public $direction = 'send';

    public $uploadFile;

    public function mount()
    {
        $this->partner_id = request()->id;
        $this->user_id = Auth::user()->id;
        // $row = DB::table('site_partner')->find($id);
        //

        // $this->like_count = DB::table('site_partner_like')
        //     ->where('partner_id', $id)
        //     ->count();




    }

    public function render()
    {
        $rows  = DB::table('site_partner_message')
            ->where('partner_id', $this->partner_id)
            ->where('user_id', $this->user_id)
            ->orderBy('created_at', 'asc')
            ->paginate(10);

        if($this->direction == 'send') {
            $viewFile = 'jiny-site-partner::site.partner.message.send';
        } else {
            $viewFile = 'jiny-site-partner::site.partner.message.receive';
        }
        //$viewFile = 'jiny-site::site.partner.message.send';
        return view($viewFile,[
            'rows' => $rows,
        ]);
    }

    public function sendMessage()
    {
        //dd($this->messageText);
        // 메시지 내용이 비어있는지 확인
        if (empty($this->messageText)) {
            return;
        }

        // 메시지 저장
        DB::table('site_partner_message')->insert([
            'partner_id' => $this->partner_id,
            'user_id' => $this->user_id,
            'message' => $this->messageText,
            'direction' => $this->direction,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // 메시지 입력창 초기화
        $this->messageText = '';
    }

    /**
     * 좋아요 처리
     */
    // public function like()
    // {
    //     //$email = Auth::user()->email;
    //     $user_id = Auth::user()->id;
    //     $partner_id = $this->partner['id'];

    //     // 중복 확인
    //     $exists = DB::table('site_partner_like')
    //         ->where('partner_id', $partner_id)
    //         ->where('user_id', $user_id)
    //         ->exists();
    //     if (!$exists) {
    //         DB::table('site_partner_like')->insert([
    //             'partner_id' => $partner_id,
    //             'user_id' => $user_id,
    //         ]);

    //         $this->like_count++;
    //     }
    // }

    public function deleteMessage($id)
    {
        // 이미지 파일이 있는지 확인
        $message = DB::table('site_partner_message')->where('id', $id)->first();
        if ($message && $message->image) {
            // 이미지 파일 경로에서 앞의 / 제거
            $imagePath = ltrim($message->image, '/');

            // 이미지 파일 삭제
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        // DB에서 메시지 삭제
        DB::table('site_partner_message')->where('id', $id)->delete();
    }

    public function uploadMessage()
    {
        if ($this->uploadFile) {
            // 임시 저장
            $tempPath = $this->uploadFile->store('temp', 'public');

            // 최종 저장 경로 생성
            $targetDir = public_path('partner/'.$this->partner_id.'/'.$this->user_id);
            if (!file_exists($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // 파일 이동
            $filename = basename($tempPath);
            $targetPath = 'partner/'.$this->partner_id.'/'.$this->user_id.'/'.$filename;
            rename(storage_path('app/public/'.$tempPath), public_path($targetPath));

            $path = "/".$targetPath;

            // 메시지 저장
            DB::table('site_partner_message')->insert([
                'partner_id' => $this->partner_id,
                'user_id' => $this->user_id,
                'image' => $path, // 이미지 파일 경로 저장
                'direction' => $this->direction,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            // 파일 초기화
            $this->uploadFile = null;
        }
    }

}
