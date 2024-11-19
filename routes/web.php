<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * partner
 */
Route::middleware(['web'])->group(function(){

    Route::get('/partner/{id}', [
        \Jiny\Site\Partner\Http\Controllers\Site\SitePartnerView::class,
        "index"])->where('id', '[0-9]+');

        Route::get('/partner', [
            \Jiny\Site\Partner\Http\Controllers\Site\SitePartner::class,
            "index"]);

    Route::get('/partner/join', [
            \Jiny\Site\Partner\Http\Controllers\Site\SitePartnerJoin::class,
            "index"]);
    Route::get('/partner/info', [
            \Jiny\Site\Partner\Http\Controllers\Site\SitePartnerInfo::class,
            "index"]);

    Route::get('/home/partner/message/{id}', [
            \Jiny\Site\Partner\Http\Controllers\Site\SitePartnerMessage::class,
            "index"])->where('id', '[0-9]+');

    Route::get('/home/partner/receive/{id}', [
        \Jiny\Site\Partner\Http\Controllers\Site\SitePartnerMessageReceive::class,
        "index"])->where('id', '[0-9]+');

});


if(function_exists('admin_prefix')) {
    $prefix = admin_prefix();

    Route::middleware(['web','auth', 'admin'])
    ->name('admin.site')
    ->prefix($prefix.'/site')->group(function () {
        Route::get('/partner',[\Jiny\Site\Partner\Http\Controllers\Admin\AdminPartner::class,
            "index"]);
        Route::get('/partner/type',[\Jiny\Site\Partner\Http\Controllers\Admin\AdminPartnerType::class,
            "index"]);
        Route::get('/partner/invoice',[\Jiny\Site\Partner\Http\Controllers\Admin\AdminPartnerInvoice::class,
            "index"]);
    });

}
