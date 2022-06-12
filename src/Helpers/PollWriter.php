<?php

namespace Inani\Larapoll\Helpers;

use Inani\Larapoll\Guest;
use Inani\Larapoll\Poll;
use Inani\Larapoll\Traits\PollWriterResults;
use Inani\Larapoll\Traits\PollWriterVoting;

class PollWriter
{
    use PollWriterResults,
    PollWriterVoting;

    /**
     * Draw a Poll
     *
     * @param Poll $poll
     * @return string
     */
    public function draw($poll)
    {
        if(is_int($poll)) {
            $poll = Poll::findOrFail($poll);
        }

        if(!$poll instanceof Poll) {
            throw new \InvalidArgumentException("The argument must be an integer or an instance of Poll");
        }

        if ($poll->isComingSoon()) {
            return 'To start soon';
        }

        // Detect NewsletterSubscriber exists
        $voter = $poll->canGuestVote() ? new Guest(request()) : NewsletterSubscriber::where('subscriber_email_address', Crypt::decryptString($this->userEmail))->first();

        if (is_null($voter) || $voter->hasVoted($poll->id) || $poll->isLocked()) {
            if (!$poll->showResultsEnabled()) {
                return 'Thanks for voting';
            }

            return $this->drawResult($poll);
        }

        if ($poll->isRadio()) {
            return $this->drawRadio($poll);
        }

        return $this->drawCheckbox($poll);
    }
}
