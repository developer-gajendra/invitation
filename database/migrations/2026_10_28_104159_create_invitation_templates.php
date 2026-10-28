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
        Schema::create('invitation_templates', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();

            $table->integer('invitation_type_id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable()->default(null);
            $table->string('view_path')->nullable()->default(null);
            $table->string('category')->nullable()->default(null);
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();

            $table->foreign('invitation_type_id')
                ->references('id')
                ->on('invitation_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_templates');
    }
};
