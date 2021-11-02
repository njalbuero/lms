<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Type;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class Washing extends Component
{
    use WithPagination;

    public $search;
    public $typeFilter;
    public $statusFilter;

    public $types;
    public $statuses;

    public function mount()
    {
        $this->statuses = Status::all();
        $this->types = Type::all();
    }

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
            'status_id' => 4
        ]);
        session()->flash('message', 'Order successfully marked as washed.');
    }
    public function render()
    {
        $orders = Order::where(function ($query){
            $query->washWalkin();
        })->orWhere(function ($query){
            $query->washOnline();
        })->search($this->search)->latest()->paginate(10);

        return view(
            'livewire.pages.admin.washing',
            ['orders' => $orders]
        );
    }
}
