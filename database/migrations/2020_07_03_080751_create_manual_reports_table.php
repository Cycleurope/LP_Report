<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManualReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_reports', function (Blueprint $table) {
            $table->id();
            $table->string('regate')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('serial')->nullable();
            $table->string('type')->nullable();
            $table->date('report_date')->nullable();
            $table->boolean('crack')->default(0);
            $table->integer('crack_length')->default(0);
            $table->text('observations')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('manual_reports');
    }
}
