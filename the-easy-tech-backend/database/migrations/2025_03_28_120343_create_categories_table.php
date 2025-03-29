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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->integer("parent_id")->nullable();
            $table->string("slug")->unique();
            $table->string("name");
            $table->enum("type", ["page","blog","study"])->default("blog");
            $table->boolean("status")->default(0);
            $table->boolean("show_on_homepage")->default(0);
            $table->foreign("parent_id")->references("id")->on("categories")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
