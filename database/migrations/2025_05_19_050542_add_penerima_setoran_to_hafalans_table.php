<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenerimaSetoranToHafalansTable extends Migration
{
    public function up()
    {
        Schema::table('hafalans', function (Blueprint $table) {
            if (!Schema::hasColumn('hafalans', 'penerima_setoran')) {
                $table->string('penerima_setoran')->nullable();
            }
        });
    }

    public function down()
    {
        Schema::table('hafalans', function (Blueprint $table) {
            if (Schema::hasColumn('hafalans', 'penerima_setoran')) {
                $table->dropColumn('penerima_setoran');
            }
        });
    }
}
