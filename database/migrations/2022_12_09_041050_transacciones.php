<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cuenta_id');
            $table->bigInteger('formaspago_id')->nulleable();
            $table->string('monto', 100);            
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cuenta_id')->references('id')->on('cuentas');
            $table->foreign('formaspago_id')->references('id')->on('formaspagos');
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
        //
    }
}