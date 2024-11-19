<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartnerOfUser extends Component
{
    // public $partner = [];
    // public $like_count = 0;

    public $asked = false;

    public function mount()
    {
        // $id = request()->id;
        // $row = DB::table('site_partner')->find($id);
        // $this->partner = get_object_vars($row); // 객체를 배열로 변환

        // $this->like_count = DB::table('site_partner_like')
        //     ->where('partner_id', $id)
        //     ->count();

        // $this->asked =
        //     ->exists();


    }

    public function render()
    {
        $rows = DB::table('site_partner_user')
            ->where('user_id', Auth::user()->id)
            ->get();

        $ids = $rows->pluck('partner_id');
        $partners = DB::table('site_partner')->whereIn('id', $ids)->get();
        $partners = $partners->keyBy('id');
        //dd($partners);

        $viewFile = 'jiny-site-partner::site.partner.home.user';
        return view($viewFile,[
            'rows' => $rows,
            'partners' => $partners,
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

    public function unask($partner_id)
    {
        $user_id = Auth::user()->id;
        //$partner_id = $this->partner['id'];

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
}
