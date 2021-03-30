<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal_pengaduan');
            $table->unsignedBigInteger('masyarakat_nik')->references('nik')->on('masyarakats');
            $table->string('judul_laporan');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['tertunda', 'proses', 'selesai']);
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
        Schema::dropIfExists('pengaduans');
    }
}
