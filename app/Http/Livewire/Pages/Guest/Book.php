<?php

namespace App\Http\Livewire\Pages\Guest;

use App\Models\Type;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Book extends Component
{
    public $types;

    public $name;
    public $mobile;
    public $address;
    public $type;
    public $instructions;
    public $weight; 
    public $price;
    
    public $rate;


    public $order;

    protected $rules = [
        'name' => 'required',
        'mobile' => 'required',
        'address' => 'required',
        'type' => 'required',
        'instructions' => 'nullable|min:3|max:1000',
        'weight' => 'required',
        'price' => 'required',
    ];

    public function mount(){
        $this->name = Auth::user()->name;
        $this->types = Type::all();
        $this->order = Order::query()
        ->hasOrder(Auth::user()->id)
        ->first();
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
        $order['isOnline'] = 1;
        $order['isPaid'] = 0;
        $order['user_id'] = Auth::user()->id;
        Order::create($order);

        session()->flash('message', 'Order successfully created.');
        return redirect()->to('book');
    }

    public function render()
    {
        return view('livewire.pages.guest.book')
        ->layout('layouts.user');
    }
}
