<?php
namespace Jiny\Site\Partner\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SitePartner extends Component
{
    //public $partners;

    public function mount()
    {

    }

    public function render()
    {
        $rows = DB::table('site_partner')->paginate(8);

        $viewFile = 'jiny-site-partner::site.partner.table';
        return view($viewFile,[
            'partners' => $rows
        ]);
    }
}
