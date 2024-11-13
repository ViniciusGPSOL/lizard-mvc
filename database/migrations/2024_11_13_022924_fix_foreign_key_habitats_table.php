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
        Schema::table('habitats', function (Blueprint $table): void {
            $table->foreignId('lizard_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->foreignId('prey_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });

        DB::table('habitats')->update([
            'lizard_id' => DB::raw('(SELECT id FROM lizards WHERE lizards.habitat_id = habitats.id LIMIT 1)'),
            'prey_id' => DB::raw('(SELECT id FROM preys WHERE preys.habitat_id = habitats.id LIMIT 1)')
        ]);

        Schema::table('lizards', function (Blueprint $table): void {
            $table->dropForeign('lizards_habitat_id_foreign');
            $table->dropColumn('habitat_id');
        });

        Schema::table('preys', function (Blueprint $table): void {
            $table->dropForeign('preys_habitat_id_foreign');
            $table->dropColumn('habitat_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('habitats', function (Blueprint $table): void {
            $table->dropForeign('habitats_prey_id_foreign');
            $table->dropForeign('habitats_lizard_id_foreign');
            $table->dropColumn('lizard_id');
            $table->dropColumn('prey_id');
        });
        Schema::table('preys', function (Blueprint $table): void {
            $table->foreignId('habitat_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });
        Schema::table('lizards', function (Blueprint $table): void {
            $table->foreignId('habitat_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
        });
    }
};
