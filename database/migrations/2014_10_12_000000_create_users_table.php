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
            $table->string('name', 100);
            $table->string('email', 150)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->enum('role', ['Admin', 'Leader', 'Apprentice']);
            $table->string('job', 100);
            $table->text('bio')->nullable();
            $table->string('city', 100);
            $table->string('state', 2);
            $table->string('current_job', 100)->nullable();
            $table->text('description')->nullable();
            $table->rememberToken();
            $table->boolean('remember')->default(false);
            $table->timestamps();
            $table->softDeletes();
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
