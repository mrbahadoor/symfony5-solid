<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

class PhotoFactor implements ScoringFactorInterface
{
    public function score(BigFootSighting $sighting): int
    {
        // Violates liskov principle by throwing an exception
        if(count($sighting->getImages()) === 0){
            // throw new \InvalidArgumentException('Sighting must have at least one image');
            return 0;
        }

        $score = 0;

        foreach($sighting->getImages() as $image){
            $score += rand(1, 100);
        }

        return $score;
    }
}