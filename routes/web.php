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
    Route::group(['prefix' => 'companies','middleware' => ['permission:CompaniesCreate|CompaniesEdit|CompaniesView|CompaniesDelete']],function(){
        Route::get('/','CompanyController@index')
            ->middleware(['permission:CompaniesCreate|CompaniesEdit|CompaniesView|CompaniesDelete'])
            ->name('companies.index');
        Route::get('/create','CompanyController@create')
            ->middleware(['permission:CompaniesCreate'])
            ->name('companies.create');
        Route::post('/','CompanyController@store')
            ->middleware(['permission:CompaniesCreate'])
            ->name('companies.store');            
        Route::get('/{company}','CompanyController@show')
            ->middleware(['permission:CompaniesView'])
            ->where('company', '[0-9]+')
            ->name('companies.show');
        Route::get('/{company}/edit','CompanyController@edit')
            ->middleware(['permission:CompaniesEdit'])
            ->where('company', '[0-9]+')
            ->name('companies.edit');
        Route::match(['put', 'patch'],'/{company}','CompanyController@update')
            ->middleware(['permission:CompaniesEdit'])
            ->where('company', '[0-9]+')
            ->name('companies.update');
        Route::delete('/{company}','CompanyController@destroy')
            ->middleware(['permission:CompaniesDelete'])
            ->where('company', '[0-9]+')
            ->name('companies.destroy');
    });
    Route::group(['prefix' => 'employees','middleware' => ['permission:EmployeesCreate|EmployeesEdit|EmployeesView|EmployeesDelete']],function(){
        Route::get('/','EmployeeController@index')
            ->middleware(['permission:EmployeesCreate|EmployeesEdit|EmployeesView|EmployeesDelete'])
            ->name('employees.index');
        Route::get('/create','EmployeeController@create')
            ->middleware(['permission:EmployeesCreate'])
            ->name('employees.create');
        Route::post('/','EmployeeController@store')
            ->middleware(['permission:EmployeesCreate'])        
            ->name('employees.store');            
        Route::get('/{employee}','EmployeeController@show')
            ->middleware(['permission:EmployeesView'])
            ->where('employee', '[0-9]+')
            ->name('employees.show');
        Route::get('/{employee}/edit','EmployeeController@edit')
            ->middleware(['permission:EmployeesEdit'])
            ->where('employee', '[0-9]+')
            ->name('employees.edit');
        Route::match(['put', 'patch'],'/{employee}','EmployeeController@update')
            ->middleware(['permission:EmployeesEdit'])
            ->where('employee', '[0-9]+')
            ->name('employees.update');
        Route::delete('/{employee}','EmployeeController@destroy')
            ->middleware(['permission:EmployeesDelete'])
            ->where('employee', '[0-9]+')
            ->name('employees.destroy');
    });
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
