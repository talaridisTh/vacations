<?php

namespace App\Http\Controllers;
use App\Models\Vacation;

class UserController extends Controller {

    public function index()
    {
        //

        return inertia("Dashboard", [
            "vacations" => Vacation::whereUserId(auth()->id())->paginate(10),
        ]);
    }

}