<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invitation_id')->constrained('invitations')->cascadeOnDelete();

            $table->string('name');
            $table->string('phone')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);

            $table->string('group_name')->nullable()->default(null);

            $table->string('side')->nullable()->default(null)->comment('Groom side or bride side');

            $table->unsignedInteger('guest_count')->default(1);

            $table->string('personalized_slug')->unique();

            $table->string('status')->default('pending');

            $table->timestamps();

            $table->index(['invitation_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};