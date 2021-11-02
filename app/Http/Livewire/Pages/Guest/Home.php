<?php

namespace App\Http\Livewire\Pages\Guest;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.home')
        ->layout('layouts.user');
    }
}
