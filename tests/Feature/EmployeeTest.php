<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class EmployeeTest extends TestCase
{
    use DatabaseTransactions;
    protected $employeeModelTest=false;

    private function loginAdminUser(){
        $user = factory(User::class)->create();
        $user->assignRole("SuperAdministrator");
        $this->actingAs($user)
            ->withSession([]);     
    }
    private function createEmployeeTest(){
        if(!$this->employeeModelTest){
            $this->employeeModelTest=factory(\App\Models\Employee::class)->create();        
        }
    }    
    /** @test **/
    public function only_user_auth_access_employees_list()
    {
        $response = $this->get(route('employees.index', ["lang" => "es"]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permision_access_employees_list()
    {
        $this->loginAdminUser();
        $response = $this->get(route('employees.index', ["lang" => "es"]))
            ->assertViewIs("web.employees.index");
    }
    /** @test **/
    public function only_user_auth_access_employee_form_create()
    {
        $response = $this->get(route('employees.create', ["lang" => "es"]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_employee_form_create()
    {
        $this->loginAdminUser();
        $response = $this->get(route('employees.create', ["lang" => "es"]))
            ->assertViewIs("web.employees.add");
    }
    /** @test **/
    public function can_create_employee()
    {
        $this->loginAdminUser();
        $first_name="f_".microtime(true);
        $last_name=microtime(true);
        $response = $this->post(route('employees.store', ["lang" => "es"]),[
            'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => "test".microtime(true)."@test.test",
            'phone' => "3202919054",            
        ])->assertRedirect(route('employees.index',["lang" => "es"]))
            ->assertSessionHas("create",__("page.employees.add.success",["name"=>$first_name." ".$last_name]));
    }
    /** @test **/
    public function only_user_auth_access_employee_form_update()
    {        
        $response = $this->get(route('employees.edit', ["lang" => "es","employee" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_employee_form_update()
    {
        $this->createEmployeeTest();
        $this->loginAdminUser();
        $response = $this->get(route('employees.edit', ["lang" => "es","employee"=>$this->employeeModelTest->id]))
            ->assertViewIs("web.employees.add")
            ->assertViewHas('employee',$this->employeeModelTest);
    }    
    /** @test **/
    public function can_update_employee()
    {
        $this->loginAdminUser();
        $this->createEmployeeTest();        
        $first_name="f_".microtime(true);
        $last_name=microtime(true);
        $response = $this->put(route('employees.update', ["lang" => "es","employee"=>$this->employeeModelTest->id]),[
            'company_id' => \App\Models\Company::inRandomOrder()->first()->id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => "test".microtime(true)."@test.test",
            'phone' => "3202919054",
        ])->assertRedirect(route('employees.index',["lang" => "es"]))
            ->assertSessionHas("update",__("page.employees.edit.success",["name"=>$first_name." ".$last_name]));
    }
    /** @test **/
    public function only_user_auth_access_employee_view()
    {        
        $response = $this->get(route('employees.show', ["lang" => "es","employee" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_employee_view()
    {
        $this->createEmployeeTest();
        $this->loginAdminUser();
        $response = $this->get(route('employees.show', ["lang" => "es","employee"=>$this->employeeModelTest->id]))
            ->assertViewIs("web.employees.view")
            ->assertViewHas('employee',$this->employeeModelTest);
    }    
    /** @test **/
    public function only_user_auth_access_employee_delete()
    {        
        $response = $this->get(route('employees.destroy', ["lang" => "es","employee" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_employee_delete()
    {
        $this->createEmployeeTest();
        $this->loginAdminUser();
        $response = $this->delete(route('employees.destroy', ["lang" => "es","employee"=>$this->employeeModelTest->id]))
            ->assertRedirect(route('employees.index',["lang" => "es"]))
            ->assertSessionHas("delete",__("page.employees.delete.success",["name"=>$this->employeeModelTest->first_name." ".$this->employeeModelTest->last_name]));
    }    
}
