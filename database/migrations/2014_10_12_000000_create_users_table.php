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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('email')->unique()->nullable();
            $table->integer('phone')->unique()->nullable();
            $table->string('google_id')->nullable();
            $table->string('password')->nullable();
            $table->text('bio')->nullable();
            $table->text('location')->nullable();
            $table->string('website')->nullable();
            $table->date('dob')->nullable();
            $table->string('profile')->nullable();
            $table->string('cover_photo')->nullable();
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
