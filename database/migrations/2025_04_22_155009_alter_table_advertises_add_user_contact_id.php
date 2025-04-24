<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(){
        Schema::table('advertises', function (Blueprint $table) {
            $table->foreignId('user_contact_id')->nullable()->after('user_id')->constrained('user_contacts')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::table('advertises', function (Blueprint $table) {
            $table->dropForeign(['user_contact_id']);
            $table->dropColumn('user_contact_id');
        });
    }
};
