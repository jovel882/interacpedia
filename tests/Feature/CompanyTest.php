<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class CompanyTest extends TestCase
{
    use DatabaseTransactions;
    protected $companyModelTest=false;

    private function loginAdminUser(){
        $user = factory(User::class)->create();
        $user->assignRole("SuperAdministrator");
        $this->actingAs($user)
            ->withSession([]);     
    }
    private function createCompanyTest(){
        if(!$this->companyModelTest){
            $this->companyModelTest=factory(\App\Models\Company::class)->create();        
        }
    }
    public function setUp() :void
    {
        parent::setUp();               
        \Illuminate\Support\Facades\Notification::fake();
    }    
    /** @test **/
    public function only_user_auth_access_companies_list()
    {
        $response = $this->get(route('companies.index', ["lang" => "es"]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permision_access_companies_list()
    {
        $this->loginAdminUser();
        $response = $this->get(route('companies.index', ["lang" => "es"]))
            ->assertViewIs("web.companies.index");
    }
    /** @test **/
    public function only_user_auth_access_company_form_create()
    {
        $response = $this->get(route('companies.create', ["lang" => "es"]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_company_form_create()
    {
        $this->loginAdminUser();
        $response = $this->get(route('companies.create', ["lang" => "es"]))
            ->assertViewIs("web.companies.add");
    }
    /** @test **/
    public function can_create_company()
    {        
        $this->loginAdminUser();
        $file = \Illuminate\Http\UploadedFile::fake()->image('companyTestImage.jpg', 500, 600)->size(1000);
        $name="Test_".microtime(true);
        $response = $this->post(route('companies.store', ["lang" => "es"]),[
            'name' => $name,
            'email' => "test".microtime(true)."@test.test",
            'logo' => $file,
            'website' => "https://dominio-test.com",            
        ])->assertRedirect(route('companies.index',["lang" => "es"]))
            ->assertSessionHas("create",__("page.companies.add.success",["name"=>$name]));

        $path=\Storage::disk('local')->path("/public/".config('page.pathImages').$file->hashName());
        $this->assertFileExists($path);
        @unlink($path);
        \Illuminate\Support\Facades\Notification::assertSentTo(
            User::first(),
            \App\Notifications\NewCompany::class,
            function ($notification, $channels) use ($name) {
                return array_search("mail",$channels)!==false && $notification->company->name === $name;
            }
        );        
    }
    /** @test **/
    public function only_user_auth_access_company_form_update()
    {        
        $response = $this->get(route('companies.edit', ["lang" => "es","company" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_company_form_update()
    {
        $this->createCompanyTest();
        $this->loginAdminUser();
        $response = $this->get(route('companies.edit', ["lang" => "es","company"=>$this->companyModelTest->id]))
            ->assertViewIs("web.companies.add")
            ->assertViewHas('company',$this->companyModelTest);
    }    
    /** @test **/
    public function can_update_company()
    {
        $this->loginAdminUser();
        $this->createCompanyTest();        
        $file = \Illuminate\Http\UploadedFile::fake()->image('companyTestImage.jpg', 500, 600)->size(1000);
        $name="Test_".microtime(true);
        $response = $this->put(route('companies.update', ["lang" => "es","company"=>$this->companyModelTest->id]),[
            'id' => $this->companyModelTest->id,
            'name' => $name,
            'email' => "test".microtime(true)."@test.test",
            'logo' => $file,
            'website' => "https://dominio-test.com",            
        ])->assertRedirect(route('companies.index',["lang" => "es"]))
            ->assertSessionHas("update",__("page.companies.edit.success",["name"=>$name]));

        $path=\Storage::disk('local')->path("/public/".config('page.pathImages').$file->hashName());
        $this->assertFileExists($path);
        @unlink($path);
    }
    /** @test **/
    public function only_user_auth_access_company_view()
    {        
        $response = $this->get(route('companies.show', ["lang" => "es","company" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_company_view()
    {
        $this->createCompanyTest();
        $this->loginAdminUser();
        $response = $this->get(route('companies.show', ["lang" => "es","company"=>$this->companyModelTest->id]))
            ->assertViewIs("web.companies.view")
            ->assertViewHas('company',$this->companyModelTest);
    }    
    /** @test **/
    public function only_user_auth_access_company_delete()
    {        
        $response = $this->get(route('companies.destroy', ["lang" => "es","company" => 1]))
            ->assertRedirect(route('login'));
    }
    /** @test **/
    public function only_user_with_permission_access_company_delete()
    {
        $this->createCompanyTest();
        $this->loginAdminUser();
        $response = $this->delete(route('companies.destroy', ["lang" => "es","company"=>$this->companyModelTest->id]))
            ->assertRedirect(route('companies.index',["lang" => "es"]))
            ->assertSessionHas("delete",__("page.companies.delete.success",["name"=>$this->companyModelTest->name]));
    }    
}
