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
            'telefone' => ['string', 'max:12'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telefone' => $request->telefone,
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
        $user->telefone = $request->telefone;
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

    public function destroy($id){
        $user = Auth::user()->id;
        $user->delete();

        return redirect('dashboard')->with('msg', 'Conta excluída com sucesso!');
    }
    
}
