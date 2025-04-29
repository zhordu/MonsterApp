<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MonsterSighting;
use App\Models\Monster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestImageTransfer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:image-transfer {sighting_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test the image transfer from a sighting to a monster';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sightingId = $this->argument('sighting_id');
        
        if ($sightingId) {
            $sighting = MonsterSighting::find($sightingId);
            if (!$sighting) {
                $this->error("Sighting with ID {$sightingId} not found.");
                return 1;
            }
            
            $this->testTransfer($sighting);
        } else {
            $sightings = MonsterSighting::where('verified', false)
                ->whereNotNull('image')
                ->get();
                
            if ($sightings->isEmpty()) {
                $this->info("No unverified sightings with images found.");
                return 0;
            }
            
            $this->info("Found {$sightings->count()} unverified sightings with images.");
            
            foreach ($sightings as $sighting) {
                $this->testTransfer($sighting);
            }
        }
        
        return 0;
    }
    
    /**
     * Test the image transfer from a sighting to a monster.
     */
    private function testTransfer(MonsterSighting $sighting)
    {
        $this->info("Testing image transfer for sighting ID: {$sighting->id}");
        $this->info("Sighting image size: " . strlen($sighting->image) . " bytes");
        
        // Get or create the monster
        $monster = Monster::where('name', $sighting->monster_name)->first();
        
        if (!$monster) {
            $monster = new Monster();
            $monster->name = $sighting->monster_name;
            $monster->category = $sighting->category;
            $monster->description = $sighting->description;
            $monster->danger_level = $sighting->danger_level;
            $monster->sightings = 1;
            $monster->lat = $sighting->lat;
            $monster->lng = $sighting->lng;
        } else {
            $monster->sightings += 1;
        }
        
        // Copy the image
        $monster->image_path = $sighting->image;
        $monster->save();
        
        // Verify the image was copied
        $monster->refresh();
        $this->info("Monster image size: " . strlen($monster->image_path) . " bytes");
        
        if (strlen($monster->image_path) > 0) {
            $this->info("Image transfer successful!");
        } else {
            $this->error("Image transfer failed!");
        }
        
        // Log for debugging
        Log::info('Test image transfer', [
            'sighting_id' => $sighting->id,
            'monster_id' => $monster->id,
            'sighting_image_size' => strlen($sighting->image),
            'monster_image_size' => strlen($monster->image_path)
        ]);
    }
} 