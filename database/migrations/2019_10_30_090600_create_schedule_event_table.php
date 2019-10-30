<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->integer('hari_pelaksanaan');
            $table->integer('bulan_pelaksanaan');
            $table->integer('tahap');
            $table->text('deskripsi');
            $table->boolean('status_event')->default(false);
            $table->boolean('nasional')->default(false);
            $table->string('kd_provinsi');
            $table->string('kd_kab');
            $table->string('kd_kel');
            $table->string('kd_puskesmas');
            $table->foreign('event_id')
                ->references('id')->on('event')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_event');
    }
}
