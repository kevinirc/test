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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('forum_id');
            $table->foreign('forum_id')
                  ->references('id')->on('discussions')
                  ->onDelete('cascade'); // Anda bisa mengganti onDelete sesuai dengan kebutuhan Anda;
            $table->string('content');
            $table->unsignedBigInteger('maker');
            $table->foreign('maker')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
