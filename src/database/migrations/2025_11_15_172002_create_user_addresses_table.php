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
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('zip_code')->comment('郵便番号');
            $table->string('prefecture')->nullable()->comment('都道府県');
            $table->string('municipality')->nullable()->comment('市区群');
            $table->string('town')->nullable()->comment('町村');
            $table->string('street')->nullable()->comment('番地以降');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_addresses');
    }
};
