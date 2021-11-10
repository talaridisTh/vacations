<?php

namespace App\Repositories\Confirm;

use App\Models\Vacation;
use Illuminate\Support\Facades\URL;

class Confirm {

    protected $choice;
    protected $vacation;

    public function __construct(Vacation $vacation, $choice)
    {

        $this->choice = $choice;
        $this->vacation = $vacation;
    }

    public function createUrl()
    {
        return URL::temporarySignedRoute('verify.confirm', now()->addDays(), ['vacation' => $this->vacation->id, "choice" => $this->choice]);
    }

}