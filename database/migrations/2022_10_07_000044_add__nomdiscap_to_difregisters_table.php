<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomdiscapToDifregistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('difregisters', function (Blueprint $table) {
            $table->string('Nomdiscap', 50)->nullable();
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
            $table->dropColumn('Nomdiscap');
            //
        });
    }
}
