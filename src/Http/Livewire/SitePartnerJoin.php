<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartnerJoin extends Component
{
    public $forms = [];
    //public $success = false;

    public $viewFile;
    public $viewMessage;
    public $message;

    public function mount()
    {
        // $id = request()->id;
        // $row = DB::table('site_partner')->find($id);
        // $this->partner = get_object_vars($row); // 객체를 배열로 변환

    }

    public function render()
    {
        if($this->message) {
            $viewMessage = 'jiny-site-partner::site.partner.join.message';
            return view($viewMessage,[

            ]);
        }

        $viewFile = 'jiny-site-partner::site.partner.join.form';
        return view($viewFile,[

        ]);
    }

    public function store()
    {
        $email = Auth::user()->email;
        if($email) {
            $row = DB::table('site_partner')->where('email', $email)->first();
            if($row) {
                $this->message = "이미 접수된 파트너입니다.";
                return;
            }
        }

        /**
         * 접수 처리
         */
        $this->forms['email'] = $email;
        $this->forms['name'] = Auth::user()->name;
        $this->forms['status'] = "pending";
        $this->forms['created_at'] = date('Y-m-d H:i:s');
        DB::table('site_partner')->insert($this->forms);
        $this->forms = [];

        $this->message = "파트너 접수가 제출 되었습니다.";
    }

    public function cancel()
    {
        $this->message = null;
    }
}
