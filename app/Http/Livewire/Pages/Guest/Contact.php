<?php

namespace App\Http\Livewire\Pages\Guest;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.contact')
        ->layout('layouts.user');
    }
}
