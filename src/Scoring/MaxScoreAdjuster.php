<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class MaxScoreAdjuster implements ScoringFactorInterface
{
    public function score(BigFootSighting $sighting): int
    {
        return 0;
    }

    public function adjustScore(int $finalScore, BigFootSighting $sighting): int
    {
        if ($finalScore > 100) {
            return 100;
        }

        return min($finalScore, 100); //IF the final score is greater than 100, return 100, otherwise return the final score
    }
}