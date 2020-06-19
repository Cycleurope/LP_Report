<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regates', function (Blueprint $table) {
            $table->id();
            $table->string('code', 12);
            $table->string('name', 80);
            $table->string('address1', 80);
            $table->string('address2', 80);
            $table->string('postal_code', 8);
            $table->string('city', 80);
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
        Schema::dropIfExists('regates');
    }
}
