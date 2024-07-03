<?php

namespace App\Livewire;

use App\Models\Tabungan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BuatTabungan extends Component
{
    use WithFileUploads;

    public $target_photo;
    public $nama;
    public $target_tabungan;
    public $per;
    public $jumlah_nabung;

    public function createTabungan(){
        $user_id = auth()->id();

        $validated = $this->validate([
            'target_photo' => 'required|image|max:1024',
            'nama' => 'required',
            'target_tabungan' => 'required|numeric|min:1000',
            'per' => 'required',
            'jumlah_nabung' => 'required|numeric|min:1000'
        ]);

        $fileName = Str::random(20) . '-'. $this->target_photo->getClientOriginalName() . '.' . $this->target_photo->getClientOriginalExtension();
        $this->target_photo->storeAs('photos', $fileName, 'public');

        $tempPath = $this->target_photo->getRealPath();
        $destinationPath = public_path('photos/' . $fileName);
        File::move($tempPath, $destinationPath);

        $validated['target_photo'] = $fileName;
        $validated['user_id'] = $user_id;
        Tabungan::create($validated);

        return redirect()->to('/celengan/user/'.auth()->id());
    }

    public function render()
    {
        return view('livewire.buat-tabungan');
    }
}
