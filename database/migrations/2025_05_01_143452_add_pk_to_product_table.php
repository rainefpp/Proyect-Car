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
        Schema::table('lunar_products', function (Blueprint $table) {
            $table->unsignedBigInteger('maximun_speed_id')->nullable();
            $table->unsignedBigInteger('displacement_id')->nullable();
            $table->unsignedBigInteger('fuel_type_id')->nullable();
            $table->unsignedBigInteger('transmission_id')->nullable();
    
            // Definir las claves foráneas
            $table->foreign('maximun_speed_id')->references('id')->on('maximun_speed')->onDelete('cascade');
            $table->foreign('displacement_id')->references('id')->on('displacement')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_type')->onDelete('cascade');
            $table->foreign('transmission_id')->references('id')->on('transmission')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('lunar_products', function (Blueprint $table) {         
                $table->dropForeign(['maximun_speed_id']);
                $table->dropForeign(['displacement_id']);
                $table->dropForeign(['fuel_type_id']);
                $table->dropForeign(['transmission_id']);          
        });
    }
};
