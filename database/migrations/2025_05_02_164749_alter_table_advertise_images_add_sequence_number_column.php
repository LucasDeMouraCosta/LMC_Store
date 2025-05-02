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
        Schema::table('advertise_images', function (Blueprint $table) {
            $table->dropColumn('featured');
            $table->integer('sequence_number')->default(0)->after('advertise_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('advertise_images', function (Blueprint $table) {
            $table->dropColumn('sequence_number');
            $table->boolean('featured')->default(false)->after('advertise_id');
        });
    }
};
