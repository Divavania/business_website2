<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use Illuminate\Support\Facades\DB; 
use App\Models\Contact;  


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
           // View Composer untuk unreadMessages
        View::composer('layouts.app', function ($view) { // Menggunakan 'layouts.app' karena sidebar biasanya ada di layout
            $unreadMessages = Contact::where('is_read', 0)->count();
            $view->with('unreadMessages', $unreadMessages);
        });
    }
}
