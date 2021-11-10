<?php

namespace App\Mail;

use App\Models\Vacation;
use App\Repositories\Confirm\Confirm;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Request;

class VacationMail extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    /**
     * @var Vacation
     */
    protected Vacation $vacation;
    /**
     * @var string
     */
    protected string $approve;
    /**
     * @var string
     */
    protected string $reject;

    /**
     * @param Vacation $vacation
     */
    public function __construct(Vacation $vacation)
    {
        $this->vacation = $vacation->load("employee");
        $this->approve = (new Confirm($vacation, "approved"))->createUrl();
        $this->reject = (new Confirm($vacation, "rejected"))->createUrl();

    }

    public function build(): VacationMail
    {
        return $this
            ->from($this->vacation->employee->email)
            ->view('emails.vacation',
                [
                    "vacation" => $this->vacation,
                    "approve" => $this->approve,
                    "reject" => $this->reject,
                ]);
    }

}