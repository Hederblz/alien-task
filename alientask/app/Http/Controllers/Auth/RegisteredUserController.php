<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    
    public function updateData(Request $request){
        $user = Auth::user()->id;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect('dashboard');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user()->id;
        $user->password = Hash::make($request->password);
        $user->update();

        return redirect('user.show')->with('msg', 'Senha alterada com sucesso!');
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if(Hash::check($request->password, $user->password))
        {
            User::findOrFail($user->id)->delete();

            return redirect('/')->with('msg', 'Conta excluída com sucesso.');
        }
        else
        {
            return redirect()->back()->with('msg', 'Senha incorreta.');
        }
    }

    public function stats()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function show()
    {
        $user = Auth::user();
        return view('profiles.show', compact('user'));
    }
    
}
