<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNombreToDifuserloginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('difuserlogins', function (Blueprint $table) {
            $table->string('Nombre', 100);
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
        Schema::table('difuserlogins', function (Blueprint $table) {
            $table->dropColumn('Nombre');
            //
        });
    }
}
