<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_event', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('judul_pesan');
            $table->text('isi_pesan');
            $table->date('tanggal');
            $table->boolean('dibaca')->default(false);
            $table->text('token_registration');
            $table->text('topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_event');
    }
}
