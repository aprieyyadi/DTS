<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_event');
            $table->integer('bulan_pelaksanaan');
            $table->text('keterangan');
            $table->integer('min_usia');
            $table->integer('max_usia');
            $table->enum('tipe_event',['nasional','provinsi','kab/kota','kecamatan','kelurahan','puskesmas']);
            $table->timestamps();
            $table->boolean('status_event')->default(false);
            $table->boolean('nasional')->default(false);
            $table->string('kd_provinsi');
            $table->string('kd_kab');
            $table->string('kd_kel');
            $table->string('kd_puskesmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event');
    }
}

