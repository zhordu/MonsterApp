<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonsterController;
use App\Http\Controllers\MonsterSightingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMonsterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminProfileController;

Route::get('/', function () {
    return redirect()->route('login'); // Redirects to the login page first
});

// Dashboard route, accessible only after authentication
Route::get('/dashboard', function () {
    $totalSightings = \App\Models\MonsterSighting::count();
    $totalMonsters = \App\Models\Monster::count();
    $recentSightings = \App\Models\MonsterSighting::with('user')
        ->latest()
        ->take(3)
        ->get();

    // Get activity trends data
    $sightings = \App\Models\MonsterSighting::all();
    
    // Calculate average danger level - convert string to integer
    $averageDangerLevel = $sightings->avg(function($sighting) {
        return (int) $sighting->danger_level;
    }) ?? 0;
    $averageDangerLevel = round($averageDangerLevel, 1);
    
    // Calculate number of high alert regions (danger level >= 4)
    $highAlertRegions = $sightings->filter(function($sighting) {
        return (int) $sighting->danger_level >= 4;
    })->groupBy('location_name')->count();

    // Calculate highest danger region
    $regionDangerLevels = [
        'Luzon' => $sightings->filter(function($sighting) {
            return $sighting->lat > 14.0;
        })->avg(function($sighting) {
            return (int) $sighting->danger_level;
        }) ?? 0,
        'Visayas' => $sightings->filter(function($sighting) {
            return $sighting->lat > 10.0 && $sighting->lat <= 14.0;
        })->avg(function($sighting) {
            return (int) $sighting->danger_level;
        }) ?? 0,
        'Mindanao' => $sightings->filter(function($sighting) {
            return $sighting->lat <= 10.0;
        })->avg(function($sighting) {
            return (int) $sighting->danger_level;
        }) ?? 0
    ];

    $highestDangerRegion = collect($regionDangerLevels)->sortDesc()->keys()->first() ?? 'No Data';
    
    // Calculate regions with very high and extreme danger levels
    $highDangerRegions = [];
    foreach ($regionDangerLevels as $region => $avgLevel) {
        $regionSightings = $sightings->filter(function($sighting) use ($region) {
            if ($region === 'Luzon') return $sighting->lat > 14.0;
            if ($region === 'Visayas') return $sighting->lat > 10.0 && $sighting->lat <= 14.0;
            if ($region === 'Mindanao') return $sighting->lat <= 10.0;
            return false;
        });

        $hasVeryHigh = $regionSightings->contains(function($sighting) {
            return (int) $sighting->danger_level >= 4;
        });

        if ($hasVeryHigh) {
            $highDangerRegions[] = $region;
        }
    }
    
    // Calculate most active time
    $hourlyActivity = $sightings->groupBy(function($sighting) {
        return \Carbon\Carbon::parse($sighting->sighting_time ?? $sighting->created_at)->hour;
    })->map->count();
    
    $mostActiveHour = $hourlyActivity->sortDesc()->keys()->first() ?? 0;
    $nextHour = ($mostActiveHour + 3) % 24;
    
    // Convert to 12-hour format with AM/PM
    $startTime = \Carbon\Carbon::createFromTime($mostActiveHour)->format('g:i A');
    $endTime = \Carbon\Carbon::createFromTime($nextHour)->format('g:i A');
    $mostActiveTime = "$startTime - $endTime";
    
    // Calculate most common type
    $categoryCounts = $sightings->groupBy('category')->map->count();
    $mostCommonType = $categoryCounts->sortDesc()->keys()->first() ?? 'Unknown';
    
    // Calculate peak activity days
    $dailyActivity = $sightings->groupBy(function($sighting) {
        return \Carbon\Carbon::parse($sighting->sighting_time ?? $sighting->created_at)->format('Y-m-d');
    })->map->count();
    
    $peakDays = $dailyActivity->sortDesc()->take(3)->keys()->map(function($date) {
        return \Carbon\Carbon::parse($date)->format('M d');
    })->join(', ') ?: 'No recent activity';

    // Convert hourly activity labels to 12-hour format
    $hourlyActivityLabels = collect(range(0, 23))->map(function($hour) {
        return \Carbon\Carbon::createFromTime($hour)->format('g:i A');
    })->toArray();

    // Get activity by category
    $categoryActivity = $sightings->groupBy('category')->map(function($categorySightings) use ($sightings) {
        return [
            'count' => $categorySightings->count(),
            'percentage' => $sightings->count() > 0 
                ? round(($categorySightings->count() / $sightings->count()) * 100, 1)
                : 0
        ];
    })->sortByDesc('count');

    // If no sightings, add a default category
    if ($categoryActivity->isEmpty()) {
        $categoryActivity = collect([
            'No Sightings' => [
                'count' => 0,
                'percentage' => 0
            ]
        ]);
    }

    return view('dashboard', compact(
        'totalSightings', 
        'totalMonsters', 
        'recentSightings',
        'mostActiveTime',
        'mostCommonType',
        'peakDays',
        'hourlyActivity',
        'hourlyActivityLabels',
        'categoryActivity',
        'sightings',
        'averageDangerLevel',
        'highAlertRegions',
        'highestDangerRegion',
        'highDangerRegions'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes, protected by authentication middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes (login, register, etc.)
require __DIR__.'/auth.php';

// New routes added below
Route::get('/interactiveMap', function () {
    return view('interactiveMap');
})->name('interactiveMap');

Route::get('/survival-guide', function () {
    return view('survival-guide');
})->name('survival.guide');

Route::get('/learnmorecombat', function () {
    return view('learnmorecombat');
})->name('learnmorecombat');

Route::get('/learnmoremonster', function () {
    return view('learnmoremonster');
})->name('learnmoremonster');

Route::get('/learnmoresurvival', function () {
    return view('learnmoresurvival');
})->name('learnmoresurvival');

// Route for monsterpedia is defined below with the MonsterController

Route::get('/community-reports', function () {
    return view('community-reports');
})->name('community-reports');

Route::get('/report-sighting', function () {
    return view('report-sighting');
})->name('report-sighting');

// Add this to your routes/web.php file
Route::resource('monsters', MonsterController::class);
Route::get('/monsterpedia', [MonsterController::class, 'index'])->name('monsterpedia');
Route::get('/monster-image/{monster}', [MonsterController::class, 'getImage'])->name('monsters.image');

// Fixed route paths to avoid conflict
Route::get('/monster-locations', [MonsterController::class, 'getLocations'])->name('monster.locations');
Route::get('/monster-sightings-locations', [MonsterSightingController::class, 'getLocations'])
    ->name('monster-sightings.locations');

// Monster Sighting Routes
Route::post('/monster-sightings', [MonsterSightingController::class, 'store'])
    ->name('monster-sightings.store')
    ->middleware(['auth']);

Route::get('/monster-sightings/{sighting}/edit', [MonsterSightingController::class, 'edit'])
    ->name('monster-sightings.edit')
    ->middleware(['auth']);

Route::put('/monster-sightings/{sighting}', [MonsterSightingController::class, 'update'])
    ->name('monster-sightings.update')
    ->middleware(['auth']);

Route::delete('/monster-sightings/{sighting}', [MonsterSightingController::class, 'destroy'])
    ->name('monster-sightings.destroy')
    ->middleware(['auth']);

Route::get('/monster-sighting-image/{sighting}', [MonsterSightingController::class, 'getImage'])->name('monster-sightings.image');

Route::get('/find-sighting-page/{id}', [MonsterSightingController::class, 'findSightingPage'])
    ->name('find-sighting-page');

Route::get('/community-reports', [MonsterSightingController::class, 'index'])
    ->name('community-reports')
    ->middleware(['auth']);

// Comment Routes
Route::post('/monster-sightings/{sighting}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware(['auth']);

Route::put('/comments/{comment}', [CommentController::class, 'update'])
    ->name('comments.update')
    ->middleware(['auth']);

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware(['auth']);

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/monsterpedia', [AdminController::class, 'monsterpedia'])->name('monsterpedia');
        Route::resource('monsters', AdminMonsterController::class)->names([
            'index' => 'monsters.index',
            'create' => 'monsters.create',
            'store' => 'monsters.store',
            'show' => 'monsters.show',
            'edit' => 'monsters.edit',
            'update' => 'monsters.update',
            'destroy' => 'monsters.destroy',
        ]);
        Route::post('/verify-sighting/{sighting}', [AdminController::class, 'verifySighting'])->name('verify-sighting');
        Route::post('/verify-sightings', [AdminController::class, 'verifySightings'])->name('verify-sightings');
        Route::post('/delete-sightings', [AdminController::class, 'deleteSightings'])->name('delete-sightings');
        Route::get('/sightings/{sighting}/edit', [AdminController::class, 'editSighting'])->name('sightings.edit');
        Route::put('/sightings/{sighting}', [AdminController::class, 'updateSighting'])->name('sightings.update');
        Route::delete('/sightings/{sighting}', [AdminController::class, 'deleteSighting'])->name('sightings.delete');
        
        // Admin Profile Routes
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
    });
});