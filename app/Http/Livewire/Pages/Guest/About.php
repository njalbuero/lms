<?php

namespace App\Http\Livewire\Pages\Guest;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.pages.guest.about')
        ->layout('layouts.user');
    }
}
