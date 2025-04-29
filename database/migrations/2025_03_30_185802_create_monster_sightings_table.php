<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monster_sightings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('monster_name');
            $table->string('category')->nullable();
            $table->text('description');
            $table->string('danger_level')->default('Unknown');
            $table->decimal('lat', 10, 7);
            $table->decimal('lng', 10, 7);
            $table->string('location_name')->nullable();
            $table->timestamp('sighting_time')->nullable();
            $table->boolean('verified')->default(false);
            // Removed binary image field to add as LONGBLOB
            $table->timestamps();
        });
        
        // Add image as LONGBLOB using a raw SQL statement
        DB::statement("ALTER TABLE monster_sightings ADD image LONGBLOB");
    }

    public function down()
    {
        Schema::dropIfExists('monster_sightings');
    }
};