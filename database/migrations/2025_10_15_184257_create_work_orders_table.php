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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->foreignId('quote_id')->nullable()->constrained('quotes')->onDelete('set null');
            $table->text('description');
            $table->enum('status', ['En espera', 'En proceso', 'Finalizada', 'Facturada'])->default('En espera');
            $table->unsignedBigInteger('assigned_to')->nullable(); // Relación con User, puede ser N a M
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};
