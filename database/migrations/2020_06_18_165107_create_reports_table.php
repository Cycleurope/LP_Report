<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('checkup');
            $table->dateTime('report_date');
            $table->boolean('crack')->default(0);
            $table->integer('crack_length')->default(0);
            $table->text('observations')->nullable();
            $table->char('postalcode', 8)->nullable();
            $table->text('city')->nullable();
            $table->bigInteger('serial_id')->unsigned();
            $table->foreign('serial_id')->references('id')->on('serials')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('regate_id')->unsigned();
            $table->foreign('regate_id')->references('id')->on('regates')->onDelete('cascade');
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
        Schema::dropIfExists('reports');
    }
}
