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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->dateTime('sighting');
            $table->string('street',255);
            $table->string('number',50)->nullable();
            $table->string('complement',50)->nullable();
            $table->string('district')->nullable();
            $table->string('city');
            $table->string('state',2);
            $table->string('zipcode',10);
            $table->string('country',50);
            $table->text('description');
            $table->enum('status',['pending','approved','rejected','fake']);
            $table->string('slug',255);
            $table->string('latitude',50)->nullable();
            $table->string('longitude')->nullable();
            $table->ipAddress('visitor');
            $table->foreignId('user_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
