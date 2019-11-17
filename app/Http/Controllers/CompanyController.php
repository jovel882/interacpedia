<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;

class CompanyController extends Controller
{
    protected $company;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company=$company;
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=$this->company->getAll(true);
        return view("web.companies.index",compact("companies"));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("web.companies.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        if($request->logo){
            $path="public/".config('page.pathImages');
            $request->file('logo')->store($path);
            $request->request->set("logo",asset(\Storage::url($path.$request->file('logo')->hashName())));            
        }
        if($company=$this->company->store($request->request->all())){
            return redirect()->route("companies.index",['lang' => app()->getLocale()])->with('create', __("page.companies.add.success",["name"=>$company->name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.companies.add.error"));
            return back()->withInput()->withErrors($errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idCompany Id de la compañia.
     * @return \Illuminate\Http\Response
     */
    public function show($lang,$idCompany)
    {
        $company=$this->company->getById($idCompany,true);
        if($company){
            return view("web.companies.view",compact("company"));
        }
        else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($lang,Company $company)
    {
        return view("web.companies.add",compact("company"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request,$lang, Company $company)
    {
        if($request->logo){
            $path="public/".config('page.pathImages');
            $nameFile=explode('/', $company->logo);
            if($company->logo && $nameFile=end($nameFile)){
                if(\Storage::exists($path.$nameFile)){
                    \Storage::delete($path.$nameFile);
                }
            }        
            $request->file('logo')->store($path);
            $request->request->set("logo",asset(\Storage::url($path.$request->file('logo')->hashName())));            
        }
        if($company->edit($request->request->all())){
            return redirect()->route("companies.index",['lang' => app()->getLocale()])->with('update', __("page.companies.edit.success",["name"=>$company->name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.companies.edit.error"));
            return back()->withInput()->withErrors($errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang,Company $company)
    {
        if($company->remove()){
            return redirect()->route("companies.index",['lang' => app()->getLocale()])->with('delete', __("page.companies.delete.success",["name"=>$company->name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.companies.delete.error"));
            return back()->withInput()->withErrors($errors);
        }
    }
}
