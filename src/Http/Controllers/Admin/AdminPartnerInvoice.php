<?php
namespace Jiny\Site\Partner\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

/**
 * 사이트 파트너 인보이스
 */
use Jiny\WireTable\Http\Controllers\WireTablePopupForms;
class AdminPartnerInvoice extends WireTablePopupForms
{
    public function __construct()
    {
        parent::__construct();
        $this->setVisit($this);

        ## 테이블 정보
        $this->actions['table'] = "site_partner_invoice";

        $this->actions['view']['list'] = "jiny-site-partner::admin.partner_invoice.list";
        $this->actions['view']['form'] = "jiny-site-partner::admin.partner_invoice.form";

        $this->actions['title'] = "파트너 인보이스  ";
        $this->actions['subtitle'] = "파트너 인보이스를 관리합니다.";

    }


}
