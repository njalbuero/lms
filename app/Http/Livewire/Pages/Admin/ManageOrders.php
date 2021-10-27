<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Type;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;
use Livewire\WithPagination;

class ManageOrders extends Component
{
    use WithPagination;

    public $search;
    public $typeFilter;
    public $statusFilter;

    public $types;
    public $statuses;

    public function mount(){
        $this->statuses = Status::all();
        $this->types = Type::all();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilter(){
        $this->reset('search');
    }

    public function render()
    {
        $orders = Order::query()
            ->latest()
            ->search($this->search)
            // ->typeFilter($this->typeFilter)
            // ->statusFilter($this->statusFilter)
            ->paginate(10);

        return view(
            'livewire.pages.admin.manage-orders',
            ['orders' => $orders]
        );
    }
}
