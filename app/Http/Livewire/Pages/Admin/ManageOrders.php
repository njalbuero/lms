<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Order;
use Livewire\Component;

class ManageOrders extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.manage-orders',
        ['orders' => Order::latest()->get()]
    );
    }
}
