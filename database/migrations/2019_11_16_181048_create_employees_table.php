<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')->comment("Es la compañia a la que pertenece el empleado.");
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->nullable(true);
            $table->bigInteger('phone')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
            $table->index('company_id');
            $table->foreign('company_id')
            ->references('id')->on('companies')
            ->onUpdate('cascade')            
            ->onDelete('cascade');                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Schema::dropIfExists('employees');
        DB::statement("SET FOREIGN_KEY_CHECKS=1");        
    }
}
