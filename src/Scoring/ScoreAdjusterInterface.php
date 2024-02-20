<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

interface ScoreAdjusterInterface
{
    
    /**
     * Return the score that should be added to the overall score of a sighting
     * 
     * This method should not throw an exception for any normal reason.
     * 
     * @param int $finalScore
     * @param BigFootSighting $sighting
     * 
     * @return int
     */    
    public function adjustScore(int $finalScore, BigFootSighting $sighting): int;
}