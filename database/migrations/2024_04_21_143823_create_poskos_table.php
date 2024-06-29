<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoskosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posko', function (Blueprint $table) {
            $table->id();
            $table->string('nama_posko');
            $table->text('alamat');
            $table->string('kontak_penanggung_jawab');
            $table->unsignedBigInteger('daerah_id'); // Kolom untuk ID daerah (foreign key)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('daerah_id')->references('id')->on('daerah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posko');
    }
}
