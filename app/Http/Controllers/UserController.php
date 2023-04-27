<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);

        return view('user.index', compact('users'));
    }

    public function show(User $employee)
    {
        return view('user.show', compact('employee'));
    }

    public function edit(User $employee)
    {
        return view('user.edit', compact('employee'));
    }

    public function update(UpdateUserRequest $request, User $employee)
    {
        $employee->update($request->validated());
    
        return redirect()->route('user.show', $employee->id);
    }
}
