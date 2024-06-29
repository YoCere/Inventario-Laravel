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
        Schema::table('profiles', function (Blueprint $table) {
            // Verifica si la columna 'deleted_at' ya existe antes de añadirla
            if (!Schema::hasColumn('profiles', 'deleted_at')) {
                $table->softDeletes(); // Añade la columna 'deleted_at' para soft deletes
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            // Elimina la columna 'deleted_at' si existe
            if (Schema::hasColumn('profiles', 'deleted_at')) {
                $table->dropSoftDeletes(); // Elimina la columna 'deleted_at' en caso de rollback
            }
        });
    }
};
