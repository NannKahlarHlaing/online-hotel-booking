<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function showLoginForm()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('customer')->attempt($credentials)) {
            // Authentication passed...
            return redirect('/');
        }

        return redirect()->back()->withInput()->withErrors([
            'email' => 'Invalid email or password',
        ]);
    }

    public function showRegistrationForm()
    {
        return view('frontend.customer.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'cus_name' => 'required|string|max:255',
            'NRC' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);

        $customer = Customer::create([
            'name' => $request->cus_name,
            'NRC' => $request->NRC,
            'ph_no' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        
        Auth::guard('customer')->login($customer);
    }


    public function logout()
    {
        Auth::guard('customer')->logout();

        return redirect('/');
    }
}
