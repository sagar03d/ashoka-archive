<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'shutdownDefault']);
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('admin.login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/ocr', [App\Http\Controllers\OcrController::class, 'index'])->name('ocr');
Route::post('/ocrtest', [App\Http\Controllers\OcrController::class, 'test'])->name('ocr.test');

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => 'role'], function () {
    
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::resource('menus', App\Http\Controllers\Admin\MenuController::class);
    Route::resource('{menuid}/submenus', App\Http\Controllers\Admin\SubmenuController::class);
    Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
    Route::resource('media', App\Http\Controllers\Admin\MediaController::class);
    Route::resource('documents', App\Http\Controllers\Admin\DocumentController::class);
    Route::resource('{collection_id}/items', App\Http\Controllers\Admin\ItemController::class);
    Route::resource('{community_id}/collections', App\Http\Controllers\Admin\CollectionController::class);
    Route::resource('{collection_id}/items', App\Http\Controllers\Admin\ItemController::class);
    Route::resource('{item_id}/files', App\Http\Controllers\Admin\FileController::class);
    Route::resource('{community_id}/{collectionid}/subcollections', App\Http\Controllers\Admin\SubCollectionController::class);
    Route::resource('communities', App\Http\Controllers\Admin\CommunityController::class);
    Route::resource('{communityid}/subcommunities', App\Http\Controllers\Admin\SubCommunityController::class);
    Route::post('document/upload', [App\Http\Controllers\Admin\DocumentController::class, 'upload'])->name('document.file.upload');
    Route::post('update/metadata', [App\Http\Controllers\Admin\DocumentController::class, 'updateMetadata'])->name('metadata.update');
});