<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartnerView extends Component
{
    public $partner = [];
    public $like_count = 0;

    public $asked = false;

    public function mount()
    {
        $id = request()->id;
        $row = DB::table('site_partner')->find($id);
        $this->partner = get_object_vars($row); // 객체를 배열로 변환

        $this->like_count = DB::table('site_partner_like')
            ->where('partner_id', $id)
            ->count();

        $this->asked = DB::table('site_partner_user')
            ->where('partner_id', $id)
            ->where('user_id', Auth::user()->id)
            ->exists();
    }

    public function render()
    {
        $viewFile = 'jiny-site-partner::site.partner.detail.layout';
        return view($viewFile,[

        ]);
    }

    public function ask()
    {
        $user_id = Auth::user()->id;
        $partner_id = $this->partner['id'];

        // 중복 확인
        $exists = DB::table('site_partner_user')
            ->where('partner_id', $partner_id)
            ->where('user_id', $user_id)
            ->exists();
        if (!$exists) {
            DB::table('site_partner_user')->insert([
                'partner_id' => $partner_id,
                'partner_name' => $this->partner['name'],

                'user_id' => $user_id,
                'user_name' => Auth::user()->name,
            ]);
        }

        $this->asked = true;
    }

    public function unask()
    {
        $user_id = Auth::user()->id;
        $partner_id = $this->partner['id'];

        DB::table('site_partner_user')
            ->where('partner_id', $partner_id)
            ->where('user_id', $user_id)
            ->delete();

        $this->asked = false;
    }

    /**
     * 좋아요 처리
     */
    public function like()
    {
        //$email = Auth::user()->email;
        $user_id = Auth::user()->id;
        $partner_id = $this->partner['id'];

        // 중복 확인
        $exists = DB::table('site_partner_like')
            ->where('partner_id', $partner_id)
            ->where('user_id', $user_id)
            ->exists();
        if (!$exists) {
            DB::table('site_partner_like')->insert([
                'partner_id' => $partner_id,
                'partner_name' => $this->partner['name'],

                'user_id' => $user_id,
                'user_name' => Auth::user()->name,
            ]);

            $this->like_count++;
        }
    }

    private function partnerNewUser()
    {
        $row = DB::table('site_partner_user')
            ->where('partner_id', $this->partner['id'])
            ->where('user_id', Auth::user()->id)
            ->first();
        if($row) {
            return $row;
        }

        // 새로운 사용자 등록
        $id = DB::table('site_partner_user')->insertGetId([
            'partner_id' => $this->partner['id'],
            'partner_name' => $this->partner['name'],
            'partner_email' => $this->partner['email'],

            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'user_email' => Auth::user()->email
        ]);

        return DB::table('site_partner_user')->where('id', $id)->first();
    }

    /**
     * 채팅방 생성
     */
    public function makeNewChat()
    {
        $row = $this->partnerNewUser();
        if($row->chat_code) {
            // 채팅 코드가 있는 경우
            return redirect('/home/chat/message/'.$row->chat_code);
        }

        //
        // 새로운 채팅방 생성
        $title = $this->partner['name']."-".Auth::user()->name;
        $code = siteNewChat($title);

        $partner = DB::table('users')
            ->where('email', $this->partner['email'])
            ->first();

        if($code) {
            // 파트너 채팅 코드 저장
            DB::table('site_partner_user')
                ->where('partner_id', $this->partner['id'])
                ->where('user_id', Auth::user()->id)
                ->update([
                    'chat_code' => $code
                ]);
        }

        // 파트너도 채팅방 추가
        siteChatAddUser($code, $partner->id, $is_owner=false);

        return redirect('/home/chat/message/'.$code);
    }
}
