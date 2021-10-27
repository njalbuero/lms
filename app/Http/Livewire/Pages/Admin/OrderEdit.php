<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Type;
use App\Models\Order;
use App\Models\Status;
use Livewire\Component;

class OrderEdit extends Component
{
    public Order $order;
    public $statuses;
    public $types;

    public $firstname;
    public $lastname;
    public $mobile;
    public $address;
    public $type;
    public $instructions;
    public $weight;
    public $price;
    public $isPaid;

    public $rate;

    public $status;

    public function mount()
    {
        $this->statuses = Status::all();
        $this->types = Type::all();

        $this->firstname = $this->order->firstname;
        $this->lastname = $this->order->lastname;
        $this->mobile = $this->order->mobile;
        $this->address = $this->order->address;
        $this->type = $this->order->type_id;
        $this->instructions = $this->order->instructions;
        $this->weight = $this->order->weight;
        $this->price = $this->order->price;
        $this->isPaid = $this->order->isPaid;
        $this->status = $this->order->status_id;
    }

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'mobile' => 'required|regex:((^(\+)(\d){12}$)|(^\d{11}$))',
        'address' => 'required',
        'type' => 'required',
        'instructions' => 'nullable|min:3|max:1000',
        'weight' => 'required',
        'isPaid' => 'required',
        'price' => 'required',
        'status' => 'required',
    ];

    public function setPrice()
    {
        $this->price = $this->weight && $this->rate ? $this->rate * $this->weight :  '';
    }

    public function updatedType()
    {
        $this->rate = $this->type == 0 ? 25 : 30;
        $this->setPrice();
    }

    public function updatedWeight()
    {
        $this->setPrice();
    }

    public function submit()
    {
        $order = $this->validate();
        $order['type_id'] = $this->type;
        $order['status_id'] = $this->status;
        $this->order->update($order);

        session()->flash('message', 'Order successfully updated.');
        return redirect()->to('/admin/manage-orders');
    }

    public function render()
    {
        return view('livewire.pages.admin.order-edit');
    }
}
