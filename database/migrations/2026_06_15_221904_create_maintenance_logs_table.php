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
        Schema::create('maintenance_logs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('asset_id')
                ->constrained('assets')
                ->onDelete('cascade');

            $table->text('issue_description');

            $table->enum('status', [
                'open',
                'in_progress',
                'resolved'
            ])->default('open');

            $table->dateTime('reported_at')->nullable();
            $table->dateTime('resolved_at')->nullable();

            $table->text('notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_logs');
    }
};
