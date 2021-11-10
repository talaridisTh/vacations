<?php

namespace App\Mail;

use App\Models\Vacation;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    /**
     * @var Vacation
     */
    protected Vacation $vacation;

    /**
     * @param Vacation $vacation
     */
    public function __construct(Vacation $vacation)
    {
        $this->vacation = $vacation->load("employee");
    }

    /**
     * @return ConfirmMail
     */
    public function build(): ConfirmMail
    {
        return $this->from($this->vacation->employee->supervisor->email)
            ->view('emails.confirm',
                ["vacation" => $this->vacation]);
    }

}