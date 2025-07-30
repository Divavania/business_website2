<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 
use App\Models\CompanyInfo; 
use Illuminate\Support\Facades\DB;

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
        View::composer('layouts.frontend', function ($view) {
            $companyInfo = CompanyInfo::first();

            if (is_null($companyInfo)) {
                $companyInfo = (object)[
                    'company_name' => 'Tigatra Adikara',
                    'tagline' => 'Solusi Komprehensif untuk Infrastruktur IT',
                    'street' => 'Jl. Contoh No. 123',
                    'city' => 'Jakarta Selatan',
                    'province' => 'DKI Jakarta',
                    'postal_code' => '12345',
                    'country' => 'Indonesia',
                    'phone_number' => '+62 812 3456 7890',
                    'whatsapp_number' => '6281234567890', 
                    'contact_email' => 'info@tigatra.co.id',
                    'instagram_link' => 'https://instagram.com/tigatraadikara', 
                    'linkedin_link' => 'https://linkedin.com/company/tigatraadikara', 
                    'google_maps_embed_link' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus'
                ];
            }
            $view->with('companyInfo', $companyInfo);
        });
    }
}
