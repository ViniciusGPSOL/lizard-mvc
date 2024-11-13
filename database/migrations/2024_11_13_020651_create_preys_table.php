<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('species');
            $table->float('weight');
            $table->float('height');
            $table->string('description');
            $table->timestamps();

            $table->foreignId('habitat_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preys');
    }
};
