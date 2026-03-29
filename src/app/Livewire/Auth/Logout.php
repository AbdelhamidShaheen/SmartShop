<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    protected $middleware = ['auth'];

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('products.list');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
