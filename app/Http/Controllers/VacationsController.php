<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationRequest;
use App\Mail\ConfirmMail;
use App\Mail\VacationMail;
use App\Models\Vacation;
use App\Repositories\Confirm\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VacationsController extends Controller {

    public function create()
    {
        //
        return inertia("Vacations/Create");
    }

    public function store(VacationRequest $request)
    {
        $vacation = $request->store();
        $this->sendAdmin($vacation);

        return redirect(route('dashboard'))->with('success', "Vacation successful");
    }

    public function updateConfirm(Vacation $vacation, $choice)
    {
        $vacation->update(["status" => $choice]);
        $this->sendEmployee($vacation);

        return redirect()->back();
    }

    /**
     * @param Vacation $vacation
     */
    private function sendAdmin(Vacation $vacation): void
    {

        Mail::to($vacation->employee->supervisor->email)
            ->send(new VacationMail($vacation));

    }

    /**
     * @param Vacation $vacation
     */
    private function sendEmployee(Vacation $vacation): void
    {
        Mail::to($vacation->employee->email)->send(new ConfirmMail($vacation));
    }

}