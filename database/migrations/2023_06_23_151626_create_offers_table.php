<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('type', ['percentage', 'decimal']);
            $table->decimal('discount');
            $table->boolean('status')->default(0);
            $table->dateTime('start_date');
            $table->dateTime('expire_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('offers');
    }
};