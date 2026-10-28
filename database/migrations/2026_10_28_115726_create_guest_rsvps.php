<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_rsvps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('guest_id')
                ->constrained('guests')
                ->cascadeOnDelete();

            $table->foreignId('invitation_id')
                ->constrained('invitations')
                ->cascadeOnDelete();

            $table->string('status')->default('maybe')->comment('attending,not_attending,maybe');

            $table->unsignedInteger('number_of_guests')->default(1);

            $table->text('message')->nullable()->default(null);

            $table->timestamp('submitted_at')->nullable()->default(null);

            $table->timestamps();

            $table->index(['invitation_id', 'status']);
            $table->index('status');
            $table->index('invitation_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_rsvps');
    }
};