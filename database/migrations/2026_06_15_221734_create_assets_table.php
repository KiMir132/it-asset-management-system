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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('type');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->enum('status', [
                'in_stock',
                'assigned',
                'repair',
                'retired'
            ])->default('in_stock');

            $table->string('location')->nullable();
            $table->date('purchase_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
