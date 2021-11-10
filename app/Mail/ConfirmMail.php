<?php

namespace App\Mail;

use App\Models\Vacation;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class ConfirmMail extends Mailable implements ShouldQueue {

    use Queueable, SerializesModels;

    protected $vacation;

    public function __construct(Vacation $vacation)
    {
        $this->vacation = $vacation->load("employee");
    }

    public function build()
    {
        return $this->from($this->vacation->employee->supervisor->email)
            ->view('emails.confirm',
                [
                    "vacation" => $this->vacation,
                ]);
    }

}