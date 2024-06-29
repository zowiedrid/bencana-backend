<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistribusisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribusi', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_distribusi');
            $table->unsignedBigInteger('jenis_barang_id'); // Kolom untuk ID jenis barang (foreign key)
            $table->integer('jumlah_didistribusikan');
            $table->unsignedBigInteger('lokasi_distribusi'); // Kolom untuk ID posko (foreign key)
            $table->string('penerima_bantuan');
            $table->unsignedBigInteger('user_id'); // Kolom untuk ID user (foreign key)
            $table->text('keterangan')->nullable(); // Kolom untuk keterangan tambahan (opsional)
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('jenis_barang_id')->references('id')->on('barang')->onDelete('cascade');
            $table->foreign('lokasi_distribusi')->references('id')->on('posko')->onDelete('cascade');
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
        Schema::dropIfExists('distribusi');
    }
}