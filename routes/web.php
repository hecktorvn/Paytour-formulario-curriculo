<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Resume;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

App::setLocale('pt_BR');
Route::get('/', Resume::class);

Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return 'Favor efetura o login';
    })->name('login');
});
