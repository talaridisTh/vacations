<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\User;

class AdminController extends Controller {

    public function index()
    {
        return inertia("AdminPanel");
    }

    public function create()
    {
        return inertia("Admin/Create");
    }

    public function edit($user)
    {

        return inertia("Admin/Edit", [
            "user" => User::whereSlug($user)->first(),
        ]);
    }

    public function store(AdminCreateRequest $request)
    {
        $request->store();

        return redirect(route("admin.index"))->with('success', 'User created.');
    }

    public function update($user, AdminUpdateRequest $request)
    {
        $request->update($user);

        return redirect()->back()->with('success', 'User updated.');
    }

}