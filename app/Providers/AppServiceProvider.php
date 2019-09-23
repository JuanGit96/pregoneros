<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;
use phpDocumentor\Reflection\Types\Integer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('role_color', function($role) {

            $valid = "<?php ";
            $valid .= " if($role == 1){ echo 'class=\"label bg-red\"';}";
            $valid .= " elseif($role == 2){ echo 'class=\"label bg-green\"';}";
            $valid .= " elseif($role == 3){ echo 'class=\"label bg-yellow\"';}";
            $valid .= " elseif($role == 4){ echo 'class=\"label bg-blue\"';}";
            $valid .= "?>";

            return $valid;

        });

        Blade::if('superadmin', function () {
            return auth()->check() && auth()->user()->isSupeAdmin();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
