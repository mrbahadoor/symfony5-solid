<?php

namespace App\Comment;

use App\Entity\Comment;
use App\Service\RegexSpamWordHelper;
use App\Comment\CommentSpamCounterInterface;

class CommentSpamManager
{
    /**
     *  
     * @var CommentSpamCounterInterface
     */
    private CommentSpamCounterInterface $spamWordCounter;
    
    public function __construct(CommentSpamCounterInterface $spamWordCounter)
    {
        $this->spamWordCounter = $spamWordCounter;
    }
        
    
    public function validate(Comment $comment): void
    {
        $content = $comment->getContent();
        
        $badWordsOnComment = $this->spamWordCounter->countSpamWords($content);

        if ($badWordsOnComment >= 2) {
            // We could throw a custom exception if needed
            throw new \RuntimeException('Message detected as spam');
        }
    }   
}
