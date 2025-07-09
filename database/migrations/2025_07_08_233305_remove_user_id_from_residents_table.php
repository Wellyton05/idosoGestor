<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            // Se a foreign key não existir, só removemos a coluna
            if (Schema::hasColumn('residents', 'user_id')) {
                $table->dropColumn('user_id');
            }
        });
    }


    public function down(): void
    {
        Schema::table('residents', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }
};
