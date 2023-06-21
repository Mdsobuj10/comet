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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('role_id') -> default(3);
            $table->string('name');
            $table->string('email') -> unique();
            $table->string('cell') -> unique();
            $table->string('username') -> unique();
            $table->string('password');
            $table->string('acces_token') -> nullable();
            $table->string('location') -> nullable();
            $table->string('date_of_birth') -> nullable();
            $table->text('bio') -> nullable();
            $table->string('photo') -> default('avator.png');
            $table->boolean('status') -> default(true);
            $table->boolean('trash') -> default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
