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
        Schema::table('equipments', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string(column: 'provider')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('room_id')->nullable();
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('equipments', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('image');
            $table->dropColumn('room_id');
        });
    }
};
