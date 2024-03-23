<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string("posisi_lamaran");
            $table->string("nama_lengkap");
            $table->string("nama_panggilan");
            $table->string("tempat_tanggal_lahir");
            $table->enum("jenis_kelamin", ['pria', 'wanita']);
            $table->string("kebangsaan");
            $table->string("agama");
            $table->string("pendidikan_terakhir");
            $table->string("jurusan");
            $table->string("sekolah");
            $table->float("ipk");
            $table->text("alamat_terakhir");
            $table->unsignedBigInteger('family_id');
            $table->foreign('family_id')->references('id')->on('families');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};