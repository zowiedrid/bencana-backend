<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBencanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bencana', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bencana');
            $table->date('tanggal_kejadian');
            $table->time('waktu_kejadian');
            $table->string('lokasi_kejadian');
            $table->string('tingkat_keparahan_bencana');
            $table->integer('jumlah_korban');
            $table->integer('jumlah_pengungsi');
            $table->string('kerugian_materi');
            $table->text('deskripsi');
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
        Schema::dropIfExists('bencana');
    }
}