<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category'); // Aquatic, Terrestrial, Aerial, Paranormal
            $table->text('description');
            $table->string('danger_level');
            $table->integer('sightings')->default(0);
            $table->decimal('lat', 10, 7)->nullable();
            $table->decimal('lng', 10, 7)->nullable();
            // We'll remove the binary column here and add LONGBLOB separately
            $table->timestamps();
        });
        
        // Add image_path as LONGBLOB using a raw SQL statement
        DB::statement("ALTER TABLE monsters ADD image_path LONGBLOB");
    }

    public function down()
    {
        Schema::dropIfExists('monsters');
    }
};