<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;
/**
 * Return the score that should be added to the overall score of a sighting
 * 
 * This method should not throw an exception for any normal reason.
 * 
 * 
 */
interface ScoringFactorInterface
{
    public function score(BigFootSighting $sighting): int;

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