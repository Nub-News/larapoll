<?php

namespace Inani\Larapoll;

use Inani\Larapoll\Traits\Voter;
use Illuminate\Http\Request;

class Guest
{
    use Voter;

    public $newsletter_subscriber_id;

    public function __construct(Request $request)
    {
        $this->newsletter_subscriber_id = $request->ip();
    }
}
