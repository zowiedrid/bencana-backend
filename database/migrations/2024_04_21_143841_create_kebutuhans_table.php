<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKebutuhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kebutuhan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_barang_id'); // Kolom untuk ID jenis barang (foreign key)
            $table->integer('jumlah_dibutuhkan');
            $table->string('lokasi_kebutuhan');
            $table->unsignedBigInteger('bencana_id'); // Kolom untuk ID bencana (foreign key)
            $table->unsignedBigInteger('user_id'); // Kolom untuk ID user (foreign key)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('jenis_barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('bencana_id')->references('id')->on('bencana')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kebutuhan');
    }
}