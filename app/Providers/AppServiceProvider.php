<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Http;
 
// $response = Http::get('http://example.com');


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $countries = json_decode(file_get_contents(base_path('countries.json')));

        // View::share('countries', $countries);

        // function country(){
        //     // try {
        //     //     $cc = Http::get('https://api.myip.com')['cc'];
        //     // } catch (\Illuminate\Http\Client\ConnectionException $e){} 
        //     // finally{
        //     //     $cc = session()->has('country')? session('country') : 'NG';
        //     // }
        //     $country = session()->has('country')? session('country') : 'NG';

        //     $countries = json_decode(file_get_contents(base_path('countries.json')));
        //     $index = array_search($country, array_column($countries, 'iso2'));
        //     return $countries[$index];
        // }
        // country();
        // View::share('country', country());
    }
}
