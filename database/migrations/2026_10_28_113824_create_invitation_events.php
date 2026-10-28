<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invitation_events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invitation_id')
                ->constrained('invitations')
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description')->nullable()->default(null);

            $table->date('event_date')->nullable()->default(null)->index();

            $table->time('start_time')->nullable()->default(null)->index();
            $table->time('end_time')->nullable()->default(null)->index();

            $table->string('venue_name')->nullable()->default(null);
            $table->text('venue_address')->nullable()->default(null);

            $table->decimal('latitude', 10, 8)->nullable()->default(null);
            $table->decimal('longitude', 11, 8)->nullable()->default(null);

            $table->string('map_url')->nullable();

            $table->unsignedInteger('sort_order')->default(0)->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invitation_events');
    }
};