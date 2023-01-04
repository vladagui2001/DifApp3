<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomApoyoToDifregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('difregisters', function (Blueprint $table) {
            $table->string('Nom_Apoyo', 30)->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('difregisters', function (Blueprint $table) {
            $table->dropColumn('Nom_Apoyo');
            //
        });
    }
}
