<?php
namespace Jiny\Site\Partner;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\Support\Facades\File;
use Livewire\Livewire;

class JinySitePartnerServiceProvider extends ServiceProvider
{
    private $package = "jiny-site-partner";
    public function boot()
    {
        // 모듈: 라우트 설정
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', $this->package);

        // 데이터베이스
        $this->loadMigrationsFrom(__DIR__.'/../databases/migrations');

    }

    public function register()
    {
        /* 라이브와이어 컴포넌트 등록 */
        $this->app->afterResolving(BladeCompiler::class, function () {
            // 파트너 관리
            Livewire::component('site-partner',
                \Jiny\Site\Partner\Http\Livewire\SitePartner::class);
            Livewire::component('site-partner-view',
                \Jiny\Site\Partner\Http\Livewire\SitePartnerView::class);
            Livewire::component('site-partner-join',
                \Jiny\Site\Partner\Http\Livewire\SitePartnerJoin::class);
            Livewire::component('site-partner-like',
                \Jiny\Site\Partner\Http\Livewire\SitePartnerLike::class);
            Livewire::component('site-partner-of-user',
                \Jiny\Site\Partner\Http\Livewire\SitePartnerOfUser::class);
            Livewire::component('site-partner-message',
                \Jiny\Site\Partner\Http\Livewire\SitePartnerMessage::class);

        });
    }
}
