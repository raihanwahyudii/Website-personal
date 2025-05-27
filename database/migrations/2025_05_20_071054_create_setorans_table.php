<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetoransTable extends Migration
{
    public function up()
    {
        Schema::create('setorans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('surat_id')->constrained('surats')->onDelete('cascade');
            $table->date('tanggal');
            $table->integer('ayat_start');
            $table->integer('ayat_end');
            $table->text('catatan')->nullable();
            $table->text('hafalan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('setorans');
    }
}
