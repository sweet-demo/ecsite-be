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
        Schema::table('user_personal_infos', function (Blueprint $table) {
            $table->string('tel');

            $table->dropColumn(['tel1','tel2','tel3']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_personal_infos', function (Blueprint $table) {
            $table->string('tel1');
            $table->string('tel2');
            $table->string('tel3');

            $table->dropColumn('tel');
        });
    }
};
