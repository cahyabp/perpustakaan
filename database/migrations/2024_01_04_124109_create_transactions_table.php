<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('book_id');
            $table->string('tanggal_peminjaman');
            $table->string('tanggal_pengembalian')->nullable();
            $table->string('batas_pengembalian');
            $table->integer('denda')->default(0);
            $table->enum('status', ['dikembalikan', 'dipinjam', 'menunggu konfirmasi'])->default('menunggu konfirmasi');
            $table->timestamps();

            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('book_id')->on('books')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
