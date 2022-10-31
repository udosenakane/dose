<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CountryConfigController;
use App\Http\Controllers\CartController;
use Intervention\Image\ImageManagerStatic as Image;

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/countries', function () {
    $countries = json_decode(file_get_contents(base_path('countries.json')));
    if(request()->query('country')){
        $countries = array_filter($countries, function($country){
            return preg_match('/'. request()->query('country').'/i', $country->name)? $country : '' ;
        });
    }
    return response()->json($countries);
})->name('countries');

Route::get('/country/{cc}', CountryConfigController::class)->name('country');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart/decrement/{id}', [CartController::class, 'decrement'])->name('cart.decrement');
Route::get('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.delete');

Route::post('/fileupload', function (Request $request) {
    if ($request->file('file')->isValid()) {
        
        $path = $request->file->store('/public/temp_dir');
        $url = Storage::url($path);
        return response()->json(['url' => $url, 'path' => $path]);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('/search', function (Request $request) {
    $searches = DB::table('products')->where('name', 'LIKE', '%'. $request->search .'%')->get();
    
    return response()->json($searches);
})->name('search');


 
Route::resource('products', ProductController::class);

require __DIR__.'/auth.php';
