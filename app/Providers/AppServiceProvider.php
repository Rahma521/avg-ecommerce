<?php

namespace App\Providers;

use App\Models\ItemType;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view)
        {
            $cartItems = \Cart::getContent();
            $view->with('cartItems',  $cartItems);
        });
        view()->composer('*',function($view)
        {
            $footer = Contact::find(1);
            $view->with('footer',  $footer);
        });


         view()->composer('*',function($view)
        {
            $categories = ItemType::where('shop_id',21036)->where('category_id' ,0)->get();
            $view->with('categories', $categories);
        });
        Paginator::useBootstrap();
    }
}
