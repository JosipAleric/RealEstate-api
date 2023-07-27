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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("type");
            $table->string("address");
            $table->string("description")->nullable();
            $table->integer("size");
            $table->integer("bedrooms_number");
            $table->integer("bathrooms_number");
            $table->integer("price");
            $table->year("year");
            $table->boolean("inventory_status")->default(1);
            $table->string("image_path")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
