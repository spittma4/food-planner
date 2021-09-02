<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //TODO: Implement index filters
        $users = User::get();
        return Inertia::render('Users/ManageUsers', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Users/CreateUser');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request->all(), User::$addRules);

        try {
            $user = User::create($request->all());
        } catch (\Exception $ex) {
            log::error('Could not create user -  ' . $ex);
            $this->handleErrorMessage('create_user', 'Could not save a new user at this time');
        }

        return $user;
    }

    /**
     * Display the specified resource.
     * NOTE: This is using implicit binding to auto-inject the User model
     *
     * @param User $user
     * @return User
     */
    public function show(User $user)
    {
        return $user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  User $user (implicit route model binding)
     * @return User
     */
    public function update(Request $request, User $user)
    {

        $this->validateInput($request->all(), User::$editRules);

        try {
            $user->update($request->all());
        } catch (\Exception $ex) {
            log::error('Error editing user ' . $user->id . ' - ' . $ex);
            $this->handleErrorMessage('edit_user', 'Could not save user edit at this time');
        }

        return $user->fresh();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user (implicit route model binding)
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
