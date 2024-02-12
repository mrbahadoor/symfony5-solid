<?php

namespace App\Service;

use App\Entity\BigFootSighting;
use App\Model\BigFootSightingScore;

class DebuggableSightingScorer extends SightingScorer
{
    public function score(BigFootSighting $sighting): BigFootSightingScore
    {
        return parent::score($sighting);
    }
}