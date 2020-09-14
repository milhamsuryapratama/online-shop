<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('currency', function($expression) {
            return "Rp. <?php echo number_format($expression, 0, ', ', '.'); ?>";
        });

        view()->composer('*', function ($view)
        {
            if (Auth::check()) {

                $cart = Cart::join('products', 'products.id', '=', 'carts.product_id')
                    ->where('carts.user_id', Auth::id())
                    ->get([
                        DB::raw('SUM(carts.qty * products.price) as total'),
                        DB::raw('COUNT(carts.id) as count')
                    ]);

                //...with this variable
                $view->with('cartHead', $cart);
            } else {
                $view->with('cartHead', null);
            }
        });
    }
}
