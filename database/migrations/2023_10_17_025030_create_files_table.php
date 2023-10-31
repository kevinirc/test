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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('script');
            $table->string('file');
            $table->string('file_type');
            $table->unsignedBigInteger('sender');
            $table->foreign('sender')
                  ->references('id')->on('users')
                  ->onDelete('cascade'); // Anda bisa mengganti onDelete sesuai dengan kebutuhan Anda;
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
