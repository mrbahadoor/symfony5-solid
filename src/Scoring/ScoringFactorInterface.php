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
}