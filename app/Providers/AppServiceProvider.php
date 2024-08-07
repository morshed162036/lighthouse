<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        view()->composer(['client.layouts.menu','client.layouts.footer','client.product_details','client.layouts.header','backend.layout.header','backend.layout.menu-bar','backend.order.invoice'], function ($view) {
            $company = Setting::get()->first();
            $view->with(compact('company'));
        });

        View::creator('*', function ($view) {
            /** @var \Illuminate\View\View $view */
            $view->with('currentViewName', $view->getName());
        });
        $project_title = '| Light House ';
        $project_copyright = 'Design and Development by Zariq Ltd';
        $name = 'Light House';
        View::share('title', $project_title);
        View::share('company_title', $name);
        View::share('copyright', $project_copyright);
    }
}
