<?php

namespace App\Livewire;

use App\Models\Riwayat;
use App\Models\Tabungan;
use Livewire\Component;

class Menabung extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];

    public $tabungan;
    public $nominal = 0;
    public $options;

    public function mount(Tabungan $id){
        $this->tabungan = $id;
    }

    public function update(){
        $id = $this->tabungan->id;

        $validated = $this->validate([
            'nominal' => 'required|numeric|min:1000',
            'options' => 'required'
        ]);

        $validated['tabungan_id'] = $id;

        if($this->options == "plus"){
            $tabungan = Tabungan::find($id);
            $tabungan->jumlah_tabungan += $this->nominal;
            $tabungan->save();

            Riwayat::create($validated);
        } else {
            $tabungan = Tabungan::find($id);
            $tabungan->jumlah_tabungan -= $this->nominal;
            $tabungan->save();

            Riwayat::create($validated);
        }

        $this->dispatch('refreshComponent');
    }

    public function setNominal($value)
    {
        $this->nominal = $value;
    }

    public function delete(){
        $id = $this->tabungan->id;
        Tabungan::destroy($id);
        return redirect()->to('/celengan/user/'. auth()->id());
    }


    public function render()
    {
        $riwayat = $this->tabungan->riwayat()->latest()->get();

        return view('livewire.menabung',[
            'tabungan' => $this->tabungan,
            'riwayat' => $riwayat
        ]);
    }
}
