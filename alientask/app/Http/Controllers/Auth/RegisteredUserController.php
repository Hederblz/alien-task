<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
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
        $user->email = $request->email;
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

    public function destroy(Request $request)
    {
        $user = Auth::user();
        if(Hash::check($request->password, $user->password))
        {
            User::findOrFail($user->id)->delete();

            return redirect('/')->with('msg', 'Conta exclu??da com sucesso.');
        }
        else
        {
            return redirect()->back()->with('msg', 'Senha incorreta.');
        }
    }
    
}
