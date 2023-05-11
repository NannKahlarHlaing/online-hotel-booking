<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Customer;

class CustomerRegisterController extends Controller
{
    use RegistersUsers;
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function register(){
       return view('frontend.customer.register');
    }

    private function validationMessage(){
        $message = ['password.confirmed' => 'confirm dawer3rretgf'];
        return $message;
    }
    public function create(Request $request){
        $this->validate($request, [
            'cus_name' => 'required',
            'NRC' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed',
            // 'password_confirmation' => 'same:password'
        ],
        $this->validationMessage()
        );

        $customer = Customer::create([
            'name' => $request->cus_name,
            'NRC' => $request->NRC,
            'ph_no' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::guard('customer')->login($customer);

        return redirect('/create_room');

    }

}
