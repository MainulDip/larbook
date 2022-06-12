<?php

use App\Http\Controllers\ListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// All Listing
Route::get('/', [ListingController::class, 'index']);

// Single Listing
// Route::get('/listing/{id}', function ($id) {
//     $single_listing = Listing::find($id);

//     if ($single_listing) {
//         return view('listing', [
//             'heading' => 'Latest Listing',
//             'listing' => $single_listing,
//         ]);
//     } else {
//         abort('404');
//     }
// });

// Route Model Binding Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

Route::get('/hello', function () {
    return response('Hello World', 200)
        ->header('Content-Type', 'text/plain')
        ->header('foo', 'bar');
});

// http://localhost:8000/post/12
Route::get('/post/{id}', function ($id) {
    // ddd($id); // die and dump and debug
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // checking url params by regex

// localhost:8000/search?name=SomeName&city=Where
Route::get('/search', function (Request $request) {
    echo $request->name . ' ' . $request->city;
    dd($request);
});
