<?php

namespace App\Repositories\Confirm;

use App\Models\Vacation;
use Illuminate\Support\Facades\URL;

class Confirm {

    /**
     * @var
     */
    protected $choice;
    /**
     * @var Vacation
     */
    protected Vacation $vacation;

    /**
     * @param Vacation $vacation
     * @param $choice
     */
    public function __construct(Vacation $vacation, $choice)
    {
        $this->choice = $choice;
        $this->vacation = $vacation;
    }

    /**
     * Create temporary url
     * @return string
     */
    public function createUrl(): string
    {
        return URL::temporarySignedRoute('verify.confirm', now()->addDays(), ['vacation' => $this->vacation->id, "choice" => $this->choice]);
    }

}