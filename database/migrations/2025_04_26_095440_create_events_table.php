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
        Schema::create('events', function (Blueprint $table) {
            $table->id('EventID');
            $table->string('EventName');
            $table->text('Description');
            $table->string('ImageURL', 255);
            $table->dateTime('StartDate');
            $table->dateTime('EndDate');
            $table->string('Location', 255);
            $table->unsignedBigInteger('EventTypeID');
            $table->unsignedBigInteger('OrganizerID');
            $table->boolean('IsMandatory');
            $table->integer('Points')->default(0); 
            $table->dateTime('CreateAt')->useCurrent();
            $table->dateTime('ConfirmationTime')->nullable(); 
            $table->integer('Participant')->default(0); 
            $table->integer('CheckInRequired')->default(0);
            $table->integer('IsApproved')->default(0);
            $table->unsignedBigInteger('DepartmentID');

            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments');
            $table->foreign('EventTypeID')->references('EventTypeID')->on('event_types');
            $table->foreign('OrganizerID')->references('UserID')->on('account');

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
        Schema::dropIfExists('events');
    }
};