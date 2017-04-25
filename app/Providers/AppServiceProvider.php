<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;

use Illuminate\Support\Facades\Schema;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::directive('hello', function($expression) {
            return "<?= 'hello ' . $expression; ?>";
        });

        Blade::directive('cache', function ($expression) {
            return "<?= RussianDollCaching::setUp{$expression}; ?>";
        });

        Blade::directive('endcache', function ($expression) {
            return "<?= RussianDollCaching::setUp{$expression}; ?>";
        });

        Blade::directive('ago', function($expression) {

            /* return "<?= RussianDollCaching::setUp{$expression}; ?>"; */
            return "<?php echo with($expression)->updated_at->diffForHumans(); ?>";
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
        Schema::defaultStringLength(191);
    }
}
