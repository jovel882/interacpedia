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
$array_languages=config('page.lang');
Route::get('lang/{lang}', function ($lang) {
    $lang_current=\Session::get('lang')??\App::getLocale();
    $back_redirect=redirect()->back();
    if($lang_current!=$lang){
       $url_before=$back_redirect->headers->get("location");
       if(strpos($url_before, "/".$lang_current) !== false){
            $back_redirect->header("location",preg_replace('/\/'.$lang_current."/", '/'.$lang,$url_before, 1),true);
       }
    }
    \Session::put('lang', $lang);
    return $back_redirect;
})->where([
    'lang' => implode("|",$array_languages)
]);

Route::view('/', 'web.home')
    ->middleware([
        'auth'
    ]);    
Route::group(['middleware' => 'auth', 'prefix' => '{lang}/','where' => ['lang' => implode("|",$array_languages)]], function() {
    Route::group(['prefix' => 'companies'],function(){
        Route::get('/','CompanyController@index')
            ->name('companies.index');
        // Route::get('/add','ProductController@add')->name('product-add');
        // Route::post('/add','ProductController@storage')->name('product-save');
        // Route::get('/edit/{id}','ProductController@edit')->where('id', '[0-9]+')->name('product-edit');
        // Route::post('/remove','ProductController@remove')->name('product-delete');
        // Route::get('/restore/{id}','ProductController@restore')->where('id', '[0-9]+')->name('product-restore');
        // Route::get('/view/{id}','ProductController@view')->where('id', '[0-9]+')->name('product-view');
    });
});


Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
