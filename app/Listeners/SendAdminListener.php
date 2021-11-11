<?php

namespace App\Listeners;

use App\Events\SendAdminEvent;
use App\Mail\VacationMail;
use App\Models\Vacation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendAdminListener {

    /**
     * @param $event
     */
    public function handle($event)
    {
        Mail::to($event->vacation->employee->supervisor->email)
            ->send(new VacationMail($event->vacation));
    }

}
