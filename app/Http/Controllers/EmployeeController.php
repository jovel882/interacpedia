<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployee;

class EmployeeController extends Controller
{
    protected $employee;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Employee $employee)
    {
        $this->employee=$employee;
    }        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=$this->employee->getAll(true,true);
        return view("web.employees.index",compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=(new \App\Models\Company())->getAll();
        return view("web.employees.add",compact("companies"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {
        if($employee=$this->employee->store($request->all())){
            return redirect()->route("employees.index",['lang' => app()->getLocale()])->with('create', __("page.employees.add.success",["name"=>$employee->full_name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.employees.add.error"));
            return back()->withInput()->withErrors($errors);
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($lang,$idEmployee)
    {
        $employee=$this->employee->getById($idEmployee,true);
        if($employee){
            return view("web.employees.view",compact("employee"));
        }
        else{
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($lang,Employee $employee)
    {
        $companies=(new \App\Models\Company())->getAll();
        return view("web.employees.add",compact("employee","companies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request,$lang,Employee $employee)
    {
        if($employee->edit($request->all())){
            return redirect()->route("employees.index",['lang' => app()->getLocale()])->with('update', __("page.employees.edit.success",["name"=>$employee->full_name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.employees.edit.error"));
            return back()->withInput()->withErrors($errors);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang,Employee $employee)
    {
        if($employee->remove()){
            return redirect()->route("employees.index",['lang' => app()->getLocale()])->with('delete', __("page.employees.delete.success",["name"=>$employee->full_name]));
        }
        else{
            $errors = new \Illuminate\Support\MessageBag();
            $errors->add('msg_0', __("page.employees.delete.error"));
            return back()->withInput()->withErrors($errors);
        }
    }
}
