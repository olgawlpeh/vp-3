<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
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
//        if ($this->app->isLocal()) {
//            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
//        }

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $boxSize = 0;

        View::composer('layouts.sidebar.categories', function (\Illuminate\View\View $view) {
            return $view
                ->with('categories', Category::all());
        });

//        View::composer('*', function (\Illuminate\View\View $view) use ($boxSize) {
//            // Using Closure based composers...
//            $id = Auth::id();
//            if ($id) {
//                $currentOrder = Order::getCurrentOrder($id);
//                if ($currentOrder) {
//                    $boxSize = sizeof($currentOrder->goods);
//                }
//          }
//
//            return $view
//                ->with('boxSize', $boxSize);
//        });
    }
}
