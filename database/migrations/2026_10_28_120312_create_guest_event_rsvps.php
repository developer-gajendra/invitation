<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guest_event_rsvps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('guest_id')
                ->constrained('guests')
                ->cascadeOnDelete();

            $table->foreignId('event_id')
                ->constrained('invitation_events')
                ->cascadeOnDelete();

            $table->string('status')->default('maybe')->comment('attending,not_attending,maybe');

            $table->timestamps();

            // A guest should have only one RSVP per event
            $table->unique(['guest_id', 'event_id']);


            $table->index('status');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guest_event_rsvps');
    }
};