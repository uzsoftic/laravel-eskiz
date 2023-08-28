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
        Schema::create('eskiz_config', function (Blueprint $table) {
            $table->id();
            $table->string('server_host')->nullable();
            $table->string('server_protocol')->nullable();
            $table->string('alpha_name')->nullable();
            $table->string('alpha_number')->nullable();
            $table->string('api_login')->nullable();
            $table->string('api_password')->nullable();
            $table->string('sms_email')->nullable();
            $table->string('sms_password')->nullable();
            $table->text('token')->nullable();
            $table->dateTime('token_updated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskiz_config');
    }
};
