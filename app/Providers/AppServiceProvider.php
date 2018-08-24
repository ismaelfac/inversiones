<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\ServiceProvider;
use App\Http\Composers\PostSidebarComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        setlocale(LC_MONETARY, 'co_CO');
        $this->registerViewComposers();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }*/

        Carbon::setLocale(config('app.locale'));

        Request::macro('intersect', function ($data) {
            return array_filter($this->only($data));
        });
    }
    protected function registerViewComposers()
    {
        View::composer('posts.sidebar', PostSidebarComposer::class);
    }
}
