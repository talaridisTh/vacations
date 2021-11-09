<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacationRequest;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationsController extends Controller {

    public function index()
    {
        //
    }

    public function create()
    {
        //
        return inertia("Vacations/Create");
    }

    public function store(VacationRequest $request)
    {
        $request->store();

        return redirect(route('dashboard'))->with('success', "Vacation successful");
    }

    public function show(Vacation $vacation)
    {
        //
    }

    public function edit(Vacation $vacation)
    {
        //
    }

    public function update(Request $request, Vacation $vacation)
    {
        //
    }

    public function destroy(Vacation $vacation)
    {
        //
    }

}