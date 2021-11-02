<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Type;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class PickupAndDelivery extends Component
{
    use WithPagination;

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->reset('search');
    }

    public function mark(Order $order){
        $order->update([
            'status_id' => $order->status_id + 1
        ]);
        session()->flash('message', 'Order successfully updated.');
    }

    public function render()
    {
        $orders_pickup = Order::query()
            ->latest()
            ->online()
            ->pickup()
            ->paginate(10);

        $orders_delivery = Order::query()
            ->latest()
            ->online()
            ->delivery()
            ->paginate(10);

        return view(
            'livewire.pages.admin.pickup-and-delivery',
            ['orders_pickup' => $orders_pickup,
            'orders_delivery' => $orders_delivery]
        );
    }
}
