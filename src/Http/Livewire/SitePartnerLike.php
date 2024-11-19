<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartnerLike extends Component
{
    //public $partners = [];
    // public $like_count = 0;

    public function mount()
    {
        // $id = request()->id;
        // $row = DB::table('site_partner')->find($id);
        //

        // $this->like_count = DB::table('site_partner_like')
        //     ->where('partner_id', $id)
        //     ->count();




    }

    public function render()
    {
        $rows  = DB::table('site_partner_like')
            ->where('user_id', Auth::user()->id)
            ->get();



        $viewFile = 'jiny-site-partner::site.partner.home.like';
        return view($viewFile,[
            'rows' => $rows,
        ]);
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
}
