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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('image');
            $table->string('judul');
            $table->string('penulis');
            $table->string('penerbit');
            $table->string('uraian');         
            $table->string('isbn');
            $table->integer('stock');
            $table->string('sumber');
            $table->string('kode_tempat');
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
