<?php


use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SurveysController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('coming-soon');
})->name('home');
