<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipunicallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sipunicalls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('tip')->nullable();
            $table->string('status')->nullable();
            $table->string('vremya')->nullable();
            $table->string('sxema')->nullable();
            $table->bigInteger('otkuda')->nullable();
            $table->bigInteger('kuda')->nullable();
            $table->string('kto_otvetil')->nullable();
            $table->string('kto_razgovarival')->nullable();
            $table->string('dlitelnost_zvonka')->nullable();
            $table->string('dlitelnost_razgovora')->nullable();
            $table->string('vremya_otveta')->nullable();
            $table->string('ocenka')->nullable();
            $table->string('id_zapisi')->nullable();
            $table->string('metka')->nullable();
            $table->string('tegi')->nullable();
            $table->string('id_zakaza_zvonka')->nullable();
            $table->string('zapis_sushhestvuet')->nullable();
            $table->string('novyi_klient')->nullable();
            $table->string('sostoyanie_perezvona')->nullable();
            $table->string('vremya_perezvona')->nullable();
            $table->string('informaciya_iz_crm')->nullable();
            $table->string('otvetstvennyi_iz_crm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sipunicalls');
    }
}
