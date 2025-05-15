<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('UserName', 100);
            $table->string('StudentCode', 20)->nullable();
            $table->string('Password');
            $table->string('Email', 100)->nullable();
            $table->timestamp('CreatedAt')->useCurrent();
            $table->integer('Points')->default(0);
            $table->integer('IsActive')->default(1);
            $table->integer('Role')->default(0);
            $table->string('PhoneNumber');
            $table->string('FullName');
            $table->string('Avatar');
            $table->dateTime('dob');
            $table->string('Address');
            $table->string('ClassName');
            $table->unsignedBigInteger('DepartmentID');

            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
};