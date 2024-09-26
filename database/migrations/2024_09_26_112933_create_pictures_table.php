<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('picture_id');
            $table->text('picture');
            $table->text('picture_name');
            $table->text('picture_description');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
