<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'integer'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|string',
            'role' => 'nullable|integer',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|min:8',
        ]);

        if ($user->role == '1') {
            if (Hash::check($request->password_confirmation, $user->password)) {
                if ($request->password)
                {
                    $password = Hash::make($request->password);
                    $user->update([
                        'password' => $password
                    ]);
                    return redirect()->route('settings.show', $user->id);
                } else {
                    return redirect()->route('settings.show', $user->id);
                }
            }
        } else {
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login (Request $request) {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = ['email'=>$validate['email'], 'password'=> $validate['password']];

        if (! Auth::attempt($credentials))
        {
            return redirect()->route('login');
        }

        if (auth()->user()->role == 1) {
            return redirect()->route('settings.edit', 1);
        } else {
            return redirect()->route('home');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
