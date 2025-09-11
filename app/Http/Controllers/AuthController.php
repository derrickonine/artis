<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function showMethod()
    {
        return view('auth.method');
    }

    public function showRole()
    {
        return view('auth.role');
    }

    public function showRegisterForm($role)
    {
        $role = in_array($role, ['particulier','auto','entreprise']) ? $role : 'particulier';
        return view('auth.register-form', ['role' => $role]);
    }

    public function register(Request $request)
    {
        // server-side validation
        $request->validate([
            'prenom' => 'required|string|max:100',
            'nom' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed', // need password_confirmation field in form
                'min:8',
                'regex:/[a-z]/',      // at least one lowercase
                'regex:/[A-Z]/',      // at least one uppercase
                'regex:/[0-9]/',      // at least one digit
                'regex:/[@$!%*?&]/'   // at least one special char
            ],
            'phone' => 'required|string',
            'role' => ['required', Rule::in(['particulier','auto','entreprise'])]
        ]);

        $data = $request->only(['prenom','nom','email','phone','adresse','role']);
        $data['password'] = Hash::make($request->password);

        // artisans must be validated by admin
        $data['status'] = $data['role'] === 'auto' || $data['role'] === 'entreprise' ? 'pending' : 'active';

        $user = User::create($data);

        // log the user in
        Auth::login($user);

        // generate phone code but do not send SMS here (simulate)
        $user->phone_verification_code = rand(100000,999999);
        $user->save();

        // redirect to phone verification step
        return redirect()->route('auth.verify.phone')->with('message', 'Compte créé — veuillez vérifier votre téléphone (ou plus tard).');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email','password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('accueil'));
        }

        return back()->withErrors(['email' => 'Identifiants invalides'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('welcome');
    }
}
