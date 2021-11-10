<?php

namespace App\Http\Controllers;

use App\Models\Vacation;

class UserController extends Controller {

    /**
     * Show all vacations of a user
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Dashboard", [
            "vacations" => Vacation::whereUserId(auth()->id())->orderBy("created_at", "desc")->paginate(10),
        ]);
    }

}