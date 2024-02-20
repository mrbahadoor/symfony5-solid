<?php

namespace App\Comment;

use App\Entity\Comment;
use App\Service\RegexSpamWordHelper;

class CommentSpamManager
{
    /**
     *  
     * @var RegexSpamWordHelper
     */
    private RegexSpamWordHelper $spamWordHelper;
    
    public function __construct(RegexSpamWordHelper $spamWordHelper)
    {
        $this->spamWordHelper = $spamWordHelper;
    }    
    
    public function validate(Comment $comment): void
    {
        $content = $comment->getContent();
        $badWordsOnComment = $this->spamWordHelper->getMatchedSpamWords($content);

        if (count($badWordsOnComment) >= 2) {
            // We could throw a custom exception if needed
            throw new \RuntimeException('Message detected as spam');
        }
    }   
}
