<?php

namespace App\Livewire\Auth;

use App\Http\Enums\UserType;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.empty')]
class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            "type" => UserType::CUSTOMER->value
        ]);

        Auth::login($user);

        return redirect()->route('products.list'); // or home
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
