<?php

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

/**
 *
 * This is the short assignment to check your coding skills. Please take a look at the following requirements and try to write clean code in the given time.
    Library System:
    The system should be developed in Laravel. It will have an admin panel and a client panel.

    Admin Panel:
    Only the user with admin role can login to admin panel and can perform the following actions:
    Manage the racks (rack name)
    Manage the books and add them in their specific racks. (book title, author, published year)
    Only 10 books can be added in a rack. An alert should prompt if admin is trying to add more books.
    Client Panel:
 *
    Any registered user can login and perform following actions.
    Racks
    See the list of all racks and total books in them. Click on any rack to see the added book details
    Books
    Search the books with title, author name or published year.
    The result should show the book details along with the rack name
    Note:
    It normally takes 8 hours to complete this assignment but if it takes longer then you should mention time. The design layout should be presentable. Please don't use any javascript plugins for listing and searching. You need to submit all the code, database structure and configuration details if any.
 *
 * 12-3
 * 10:30-12-30
 * 12
 */

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::redirect('/' , '/home');
Route::group([
    'middleware' => ['auth' , 'admin'],
    'namespace' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin.'
    ] , function(){

        Route::get('racks', 'RackController@getRacks')->name('get.racks');
        Route::get('rack/create', 'RackController@createRack')->name('rack.create');
        Route::post('rack/store', 'RackController@storeRack')->name('rack.store');
        Route::post('rack/update/{id}', 'RackController@updateRack')->name('rack.update')->where('id' , '[0-9]+');
        Route::get('rack/edit/{id}', 'RackController@editRack')->name('rack.edit')->where('id' , '[0-9]+');
        Route::get('rack/detail/{id}', 'RackController@detailRack')->name('rack.detail')->where('id' , '[0-9]+');
        Route::get('racks/delete/{id}', 'RackController@deleteRack')->name('rack.delete')->where('id' , '[0-9]+');


        Route::get('book/create/{rack_id}', 'BookController@createBook')->name('book.create');
        Route::post('book/store', 'BookController@storeBook')->name('book.store');
        Route::post('book/update/{id}', 'BookController@updateBook')->name('book.update')->where('id' , '[0-9]+');
        Route::get('book/edit/{id}', 'BookController@editBook')->name('book.edit')->where('id' , '[0-9]+');
        Route::get('book/delete/{id}', 'BookController@deleteBook')->name('book.delete')->where('id' , '[0-9]+');
    });


Route::group([
    'middleware' => ['auth' , 'client'],
    'namespace' => 'client',
    'prefix' => 'client',
    'as' => 'client.'
] , function(){

    Route::get('racks', 'RackController@getRacks')->name('get.racks');
    Route::get('rack/detail/{id}', 'RackController@detailRack')->name('rack.detail')->where('id' , '[0-9]+');

    Route::get('search/book', 'BookController@searchBookView')->name('search.book');
    Route::post('search/book', 'BookController@searchBook')->name('search.book');

});

