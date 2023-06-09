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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_type_id')->constrained('event_types')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('venue',['online','offline'])->default('offline');
            $table->string('city');
            $table->string('games');
            $table->boolean('nv')->default(false);
            $table->integer('visitors');
            $table->string('spk');
            $table->string('live_data')->nullable();
            $table->timestamp('start_date')->default(\Carbon\Carbon::now());
            $table->timestamp('end_date')->default(\Carbon\Carbon::now()->addDays(3));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
