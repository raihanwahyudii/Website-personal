<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('setorans', function (Blueprint $table) {
        $table->integer('surat')->after('tanggal');
        $table->integer('ayat_start')->after('surat');
        $table->integer('ayat_end')->after('ayat_start');
        $table->text('catatan')->nullable()->after('ayat_end');
    });
}

public function down()
{
    Schema::table('setorans', function (Blueprint $table) {
        $table->dropColumn(['surat', 'ayat_start', 'ayat_end', 'catatan']);
    });
}
};
