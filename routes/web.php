<?php

use App\Http\Controllers\logout;
use App\Http\Middleware\CheckGuest;
use App\Http\Middleware\CheckLogin;
use App\Livewire\BuatTabungan;
use App\Livewire\Homepage;
use App\Livewire\LoginPage;
use App\Livewire\Menabung;
use App\Livewire\RegisterPage;
use App\Livewire\TabunganList;
use Illuminate\Support\Facades\Route;

Route::get('/', Homepage::class);
Route::get('/celengan/user/{user}', TabunganList::class)->name('celengan')->middleware(CheckLogin::class);
Route::get('/login', LoginPage::class)->middleware(CheckGuest::class)->name('home');
Route::get('/register', RegisterPage::class)->middleware(CheckGuest::class);

Route::get('/celengan/buat', BuatTabungan::class)->middleware(CheckLogin::class);
Route::get('/celengan/nabung/{id}', Menabung::class)->middleware(CheckLogin::class);

Route::post('/logout',[logout::class,'logout']);