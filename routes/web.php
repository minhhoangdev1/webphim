<?php

use Illuminate\Support\Facades\Route;

//public page controller
use App\Http\Controllers\IndexController;

//admin controller
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\Director_actorController;
use App\Http\Controllers\CustomAuthController;

use Illuminate\Support\Facades\Auth;

//route web
Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/danh-muc/{slug}', 'movieByCategory')->name('category');
    Route::get('/quoc-gia/{slug}', 'movieByCountry')->name('country');
    Route::get('/the-loai/{slug}', 'movieByGenre')->name('genre');
    Route::get('/phim/{slug}', 'movieDetail')->name('movie');
    Route::get('/xem-phim/{slug}/tap-{tap}', 'watchMovie');
    Route::get('/tag/{tag}', 'movieTag')->name('tag');
    Route::get('/filter-sidebar', 'filter_sidebar')->name('filter_sidebar');
    Route::get('/search', 'search')->name('search');
    Route::get('/{type}/{name}~{id}', 'movieByDirectorOrActor')->name('director_actor');
    Route::get('/visitWebsite', 'visitWebsite')->name('visitWebsite');
    Route::get('/ratingMovie', 'ratingMovie')->name('ratingMovie');
});

//route admin
Auth::routes();
Route::prefix('admin')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/home', 'index')->name('home');
        Route::get('/filterMovieTrending', 'filterMovieTrending')->name('filterMovieTrending');
        Route::get('/hideOrShow', 'hideOrShow')->name('hideOrShow');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/resorting', 'resorting')->name('resorting');
        Route::delete('/deleteManyCategory', 'deleteManyCategory')->name('deleteManyCategory');
    });
    Route::controller(MovieController::class)->group(function () {
        Route::get('/select-year', 'select_year')->name('select_year');
        Route::get('/select-seasion', 'select_seasion')->name('select_seasion');
        Route::get('/change_slug', 'change_slug')->name('change_slug');
        Route::delete('/deleteManyMovie', 'deleteManyMovie')->name('deleteManyMovie');
    });
    Route::controller(EpisodeController::class)->group(function () {
        Route::get('/select-episode', 'select_episode')->name('select_episode');
        Route::get('/getDataEpisode', 'getDataEpisode')->name('getDataEpisode');
    });

    Route::delete('/deleteManyCountry', [CountryController::class, 'deleteManyCountry'])->name('deleteManyCountry');
    Route::delete('/deleteManyGenre', [GenreController::class, 'deleteManyGenre'])->name('deleteManyGenre');
    Route::delete('/deleteManyDirACt', [Director_actorController::class, 'deleteManyDirACt'])->name('deleteManyDirACt');

    Route::resource('director_actor', Director_actorController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('country', CountryController::class);
    Route::resource('episode', EpisodeController::class);
    Route::resource('genre', GenreController::class);
    Route::resource('movie', MovieController::class);
});
