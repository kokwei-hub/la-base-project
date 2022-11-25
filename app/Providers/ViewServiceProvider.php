<?php

namespace App\Providers;

use Illuminate\Support\Facades\{Auth, View};
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /* Localization menu options */
        // View::composer('admin.includes.header', function ($view) {
        //     $view->with('current_locale', app()->getLocale());
        //     $view->with('available_locales', config('app.available_locales'));
        // });

        /* Localization file name */
        View::composer('layouts.app', function ($view) {
            $view->with('locale', app()->getLocale());
            // $locale = file_get_contents(resource_path('lang/'. app()->getLocale() .'.json'));
            // $view->with('localization', json_encode(json_decode($locale, true)));
        });

        /* only aside layout access to this menu data
           -- '*' = all page */
        // View::composer('*', function($view) {
        // View::composer('admin.includes.aside', function($view) {
        //     $admin = Auth::guard('admin')->user();
        //     $view->with('menu', $admin->getMenuLinks());
        // });
    }
}
