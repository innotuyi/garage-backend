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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cooperativeId');
            $table->unsignedBigInteger('insepectorId');
            $table->date('inspectionDate');
            $table->string('inspectionType');
            $table->string('inspectionResults');
            $table->foreign('cooperativeId')->references('id')->on('Cooperative')
            ->onDelete('restrict')
            ->onUpdate('cascade');

        $table->foreign('insepectorId')->references('id')->on('Inspector')
               ->onDelete('restrict')
               ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inspections');
    }
};
