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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("desc")->nullable();
            $table->string("image")->nullable();
            $table->string("phone")->nullable();
            $table->string("growth")->nullable();
            $table->string("solving")->nullable();
            $table->string("income")->nullable();
            $table->string("achiever")->nullable();
            $table->boolean("status")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
