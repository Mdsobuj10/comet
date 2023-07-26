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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title') -> unique();
            $table->string('slug') -> unique();
            $table->string('featured');
            $table->text('gellary') -> nullable();
            $table->text('client') -> nullable();
            $table->string('date') -> nullable();
            $table->string('link') -> nullable();
            $table->string('types') -> nullable();
            $table->text('desc') -> nullable();
            $table->string('steps') -> nullable();
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
        Schema::dropIfExists('portfolios');
    }
};
