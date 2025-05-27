<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHafalansTable extends Migration
{
    public function up()
    {
        Schema::create('hafalans', function (Blueprint $table) {
            $table->id();
            $table->string('surat');
            $table->string('ayat');
            $table->date('tanggal_setoran');
            $table->string('penerima_setoran')->nullable();
            $table->string('status')->default('belum disetujui');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Jika menggunakan foreign key:
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hafalans');
    }
}
