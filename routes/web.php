<?php

use App\Livewire\CheckoutPage;
use App\Livewire\CheckoutSuccessPage;
use App\Livewire\CollectionPage;
use App\Livewire\Home;
use App\Livewire\ProductPage;
use App\Livewire\QuieneSomosPage;
use App\Livewire\SearchPage;
use Illuminate\Support\Facades\Route;
use App\Livewire\FAQS;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\PerfilPage;

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


Route::get('/', Home::class)->name('/');

Route::get('/collections/{slug}', CollectionPage::class)->name('collection.view');

Route::get('/products/{slug}', ProductPage::class)->name('product.view');

Route::get('search', SearchPage::class)->name('search.view');

Route::get('checkout', CheckoutPage::class)->name('checkout.view');

Route::get('checkout/success', CheckoutSuccessPage::class)->name('checkout-success.view');

Route::get('/preguntasFrecuentes', FAQS::class)->name('faqs.page');
require __DIR__.'/auth.php';

Route::get('/register', RegisterPage::class)->name('register');
Route::get('/perfil', PerfilPage::class)->name('perfil');