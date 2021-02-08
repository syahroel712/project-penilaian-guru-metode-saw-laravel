<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuruModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_guru', function (Blueprint $table) {
            $table->bigIncrements('guru_id');
            $table->integer('sekolah_id');
            $table->string('guru_nama');
            $table->date('guru_tgl_lahir');
            $table->enum('guru_jekel', ['Pria', 'Wanita']);
            $table->string('guru_email')->nullable();
            $table->string('guru_notelp')->nullable();
            $table->text('guru_alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_guru');
    }
}
