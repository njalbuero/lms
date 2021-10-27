<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\Type;
use App\Models\Order;
use Livewire\Component;

class OrderCreate extends Component
{
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

    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'mobile' => 'required',
        'address' => 'required',
        'type' => 'required',
        'instructions' => 'nullable|min:3|max:1000',
        'weight' => 'required',
        'isPaid' => 'required',
        'price' => 'required',
    ];

    public function mount(){
        $this->types = Type::all();
        $this->paid = false;
    }

    public function setPrice(){
        $this->price = $this->weight && $this->rate ? $this->rate * $this-> weight :  '';
    }

    public function updatedType(){
        $this->rate = $this->type == 0 ? 25:30;
        $this->setPrice();
    }

    public function updatedWeight(){
        $this->setPrice();
    }

    public function submit(){
        $order = $this->validate();
        $order['type_id'] = $this->type;
        Order::create($order);

        session()->flash('message', 'Order successfully created.');
        return redirect()->to('/admin/manage-orders');
    }

    public function render()
    {
        return view('livewire.pages.admin.order-create');
    }
}
