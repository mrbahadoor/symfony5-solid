<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\BigFootSightingScore;

class SightingScorer
{
    /** @var iterable ScoringFactorInterface[] */
    private iterable $scoringFactors;

    /** @var iterable ScoreAdjusterInterface[] */
    private iterable $scoringAdjusters;

    public function __construct(iterable $scoringFactors, iterable $scoringAdjusters)
    {
        $this->scoringFactors = $scoringFactors;
        $this->scoringAdjusters = $scoringAdjusters;
    }
    
    
    public function score(BigFootSighting $sighting): BigFootSightingScore
    {
        $score = 0;
        foreach ($this->scoringFactors as $factor) {
             $score += $factor->score($sighting);
        }

        foreach ($this->scoringAdjusters as $scoringAdjuster) {
            $score = $scoringAdjuster->adjustScore($score, $sighting);
        }

        return new BigFootSightingScore($score);
    }
}
