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
        Schema::create('habitats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('biome');
            $table->string('temperature');
            $table->timestamps();
        });

        Schema::table("lizards", function (Blueprint $table) {
            $table->foreignId("habitat_id")
                ->nullable()
                ->constrained()
                ->onDelete("set null");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lizards', function (Blueprint $table) {
            $table->dropForeign('lizards_habitat_id_foreign');
            $table->dropColumn('habitat_id');
        });
        Schema::dropIfExists('habitats');
    }
};
