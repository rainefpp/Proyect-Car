<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Lunar\Models\Order;
use Lunar\Models\Order_lines;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PerfilPage extends Component
{

    public $orders;
    public $orderlines;
    public function mount(){
        $this->catchOrders();
  
    }
    public function render()
    {
        return view('livewire.auth.perfil-page');
    }

    public function catchOrders(){
        $user =Auth::user();
        $this->orders = Order::where('user_id', $user->id)
            ->orderBy('created_at')
            ->with('lines','transactions') 
            ->get();
        //dd($this->orders);
    }
}
