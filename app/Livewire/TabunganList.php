<?php

namespace App\Livewire;

use App\Models\Tabungan;
use App\Models\User;
use Livewire\Component;

class TabunganList extends Component
{
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;

        if ($user->id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function render()
    {
        $tabungan = $this->user->tabungan;
        
        return view('livewire.tabungan-list',[
            'tabungan' => $tabungan,
        ]);
    }
}
