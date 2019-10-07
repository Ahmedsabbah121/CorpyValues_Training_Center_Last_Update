<?php

namespace App\Providers;
use DB;
use Illuminate\Support\ServiceProvider;

class CentersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $all_centers = DB::table('users')->where('type','academy')->where('publication_status',1)->get();
            return $view->with('all_centers',$all_centers);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
