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

    /**
     * show page of create sVacation
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Vacations/Create");
    }

    /**
     *Create a vacation
     * @param VacationRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function store(VacationRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $vacation = $request->store();
        $this->sendAdmin($vacation);

        return redirect(route('dashboard'))->with('success', "Vacation successful");
    }

    /**
     * Update status a send email
     * @param Vacation $vacation
     * @param $choice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateConfirm(Vacation $vacation, $choice): \Illuminate\Http\RedirectResponse
    {
        $vacation->update(["status" => $choice]);
        $this->sendEmployee($vacation);

        return redirect()->back();
    }

    /**
     * Send email to admin
     * @param Vacation $vacation
     */
    private function sendAdmin(Vacation $vacation): void
    {

        Mail::to($vacation->employee->supervisor->email)
            ->send(new VacationMail($vacation));

    }

    /**
     * Send email to employee
     * @param Vacation $vacation
     */
    private function sendEmployee(Vacation $vacation): void
    {
        Mail::to($vacation->employee->email)->send(new ConfirmMail($vacation));
    }

}