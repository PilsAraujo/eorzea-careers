<?php

use App\Models\Faction;
use App\Models\Job;

it('belongs to a faction', function () {
    // Arrange
    $faction = Faction::factory()->create();
    $job = Job::factory()->create([
        'faction_id'=> $faction->id
    ]);
    
    // Act and Assert
    expect($job->faction->is($faction))->toBeTrue();
    
});

it('can have tags', function () {
    // AAA
    $job = Job::factory()->create(); 

    $job->tag('Magical');

    expect($job->tags)->toHaveCount(1);    
});
