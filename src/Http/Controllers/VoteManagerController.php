<?php

namespace Inani\Larapoll\Http\Controllers;

use Exception;
use Inani\Larapoll\Poll;
use Inani\Larapoll\Guest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteManagerController extends Controller
{
    /**
     * Make a Vote
     *
     * @param Poll $poll
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function vote(Poll $poll, Request $request)
    {
        // $voteFor = $poll->options()->first();

        // a voter(user) picks a poll to vote for
        // only ids or array of ids are accepted
        // $voter->poll($poll)->vote($voteFor->getKey());




        try {
            $vote = $this->resolveVoter($request, $poll)
            ->poll($poll)
            ->vote($request->get('options'));

            if($vote) {
                return back()->with('success', 'Vote Done');
            }
        } catch (Exception $e) {
            return back()->with('errors', $e->getMessage());
        }
    }

    /**
     * Get the instance of the voter
     *
     * @param Request $request
     * @param Poll $poll
     * @return Guest|mixed
     */
    protected function resolveVoter(Request $request, Poll $poll)
    {
        dd($request->voter);

        // $voter = NewsletterSubscriber::where('subscriber_email_address', Crypt::decryptString($this->userEmail))->first();

        if($poll->canGuestVote()) {
            return new Guest($request);
        }

        // return $request->user(config('larapoll_config.admin_guard'));
    }
}
