<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminUpdateRequest;
use App\Models\User;

class AdminController extends Controller {

    /**
     * Get all user of supervisor
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("AdminPanel");
    }

    /**
     * Create user
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function create(): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Admin/Create");
    }

    /**
     * Show edit page of a user
     * @param $user
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function edit($user): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia("Admin/Edit", [
            "user" => User::whereSlug($user)->first(),
        ]);
    }

    /**
     *
     * Create a user
     * @param AdminCreateRequest $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function store(AdminCreateRequest $request): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        $request->store();

        return redirect(route("admin.index"))->with('success', 'User created.');
    }

    /**
     * Update a user
     * @param $user
     * @param AdminUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($user, AdminUpdateRequest $request): \Illuminate\Http\RedirectResponse
    {
        $request->update($user);

        return redirect()->back()->with('success', 'User updated.');
    }

}