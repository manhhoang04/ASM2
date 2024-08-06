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
            $table->id('id');
            $table->string('fullname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('adress');
            $table->string('sdt'); // Sử dụng string hoặc integer tùy thuộc vào yêu cầu của bạn
            $table->date('birthday');
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('active')->default(true);
            $table->timestamps(); // Thêm cột created_at và updated_at
          
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
