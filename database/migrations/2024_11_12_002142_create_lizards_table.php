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
        Schema::create('lizards', function (Blueprint $table) {
            $table->id(); //Auto Increment ID
            $table->string('name');
            $table->string('species');
            $table->integer('age')->nullable(); //can also contain null"
            $table->float('weight')->nullable(); //can also contain null
            $table->text('description');
            $table->boolean('poisonous')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lizards');
    }
};
