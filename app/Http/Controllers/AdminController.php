<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\User;

class AdminController extends Controller {

    public function index()
    {

        return inertia("AdminPanel", [
            "employers" => auth()->user()->isEmployer()->orderBy("updated_at", "desc")->paginate(10),
        ]);
    }

    public function create()
    {

        return inertia("Admin/Create", [
            "roles" => User::ROLE,
        ]);

    }

    public function edit( $user)
    {

        return inertia("Admin/Edit", [
            "roles" => User::ROLE,
            "user" => User::whereSlug($user)->first(),
        ]);
    }

    public function store(AdminCreateRequest $request)
    {

        $request->store();

        return $this->index();

    }
    public function update($user, AdminUpdateRequest $request)
    {

        $request->update($user);

        return $this->index();

    }

}