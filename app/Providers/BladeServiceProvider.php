<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        //
        Blade::directive('klang', function($name,$param=[]) {

            if(empty($param))
            {
                return  "<?php echo __('website.'.$name)?>";
            }else
            {
                return  "<?php echo __('website.'.$name,$param)?>";
            }

        });
        Blade::directive('kongqi', function($name) {
                return  "<?php echo config('copyright.'.$name)?>";
        });
        Blade::directive('plugin_res', function($name) {
            return  "<?php echo plugin_res($name)?>";
        });
    }
}
