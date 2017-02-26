<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suites', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('street_id');
            $table->string('address', 64);

            $table->string('type', 16)->nullable();
            $table->string('status', 16)->nullable();

            $table->text('note')->nullable();

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suites');
    }
}
