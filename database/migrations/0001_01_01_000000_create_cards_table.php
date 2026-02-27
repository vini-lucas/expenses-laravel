<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->string('bank');
            $table->integer('end')->unique();
            $table->string('current_invoice')->nullable();
            $table->json('invoice_history')->nullable();
        });

        FacadesDB::statement('ALTER TABLE cards AUTO_INCREMENT = 6;');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
