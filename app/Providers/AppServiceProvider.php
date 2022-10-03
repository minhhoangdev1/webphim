<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;

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
        $category = Category::orderBy('id', 'DESC')->where('status', 1)->get();
        $country = Country::orderBy('id', 'DESC')->where('status', 1)->get();
        $genre = Genre::orderBy('id', 'DESC')->where('status', 1)->get();
        $phim_hot_sidebar = Movie::with('view')->where('phim_hot', 1)->where('hide_or_show', 1)->whereNotIn('status', [0])->orderBy('date_updated', 'DESC')->take(5)->get();
        $phim_sap_chieu = Movie::where('status', 0)->where('hide_or_show', 1)->orderBy('date_updated', 'DESC')->take(5)->get();

        View::share([
            'category' => $category,
            'country' => $country,
            'genre' => $genre,
            'phim_hot_sidebar' => $phim_hot_sidebar,
            'phim_sap_chieu' => $phim_sap_chieu,
        ]);
    }
}
