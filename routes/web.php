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

Route::view('{lang}/', 'web.home')
    ->middleware([
        'auth'
    ])
    ->where([
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
        Route::get('/create','CompanyController@create')
            ->name('companies.create');
        Route::post('/','CompanyController@store')
            ->name('companies.store');            
        Route::get('/{company}','CompanyController@show')
            ->where('company', '[0-9]+')
            ->name('companies.show');
        Route::get('/{company}/edit','CompanyController@edit')
            ->where('company', '[0-9]+')
            ->name('companies.edit');
        Route::match(['put', 'patch'],'/{company}','CompanyController@update')
            ->where('company', '[0-9]+')
            ->name('companies.update');
        Route::delete('/{company}','CompanyController@destroy')
            ->where('company', '[0-9]+')
            ->name('companies.destroy');
    });
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
