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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();

            // Relations
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->integer('invitation_template_id');

            // Basic information
            $table->string('slug')->unique();
            $table->string('title')->nullable()->default(null);

            // Couple information
            $table->string('person1_name');
            $table->string('person2_name')->nullable()->default(null);

            // Photos
            $table->string('person1_photo')->nullable()->default(null);
            $table->string('person2_photo')->nullable()->default(null);

            // Invitation content
            $table->text('description')->nullable()->default(null);

            // Wedding date
            $table->dateTime('invitation_date');

            // Status
            $table->string('status')->default('draft');

            // Music
            $table->tinyInteger('music_enabled')->default(0);

            // Publishing
            $table->timestamp('published_at')->nullable()->default(null);

            // Soft delete
            $table->softDeletes();

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index('user_id');
            $table->index('invitation_template_id');
            $table->index('status');
            $table->index('music_enabled');
            $table->index('invitation_date');
            $table->index('published_at');

            $table->foreign('invitation_template_id')->references('id')->on('invitation_templates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};