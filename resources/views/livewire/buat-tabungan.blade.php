@push('title','Asyik nabung')

<div class="min-h-screen flex justify-center items-center">

    <div class="bg-zinc-300 mb-16 p-3 rounded-lg">
        <h1 class="mx-2 font-bold text-black text-2xl">Buat Tabungan</h1>
        <form class="p-2" wire:submit='createTabungan'>
            <div class="mb-2">
                <label class="text-black" for="file">Upload foto target mu</label>
                <input wire:model='target_photo' type="file"
                    class="file-input file-input-bordered w-full" />
                @error('target_photo') {{ $message }} @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="nama">Nama tabungan</label>
                <input wire:model='nama' type="text" placeholder="Type here"
                    class="input input-bordered block w-full" />
                    @error('nama') {{ $message }} @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="target">Target tabungan</label>
                <input wire:model='target_tabungan' type="text" placeholder="Type here"
                    class="input input-bordered block w-full" />
                    @error('target_tabungan') {{ $message }} @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="target">Jumlah nabung</label>
                <input wire:model='jumlah_nabung' type="text" placeholder="Type here"
                    class="input input-bordered block w-full" />
                    @error('jumlah_nabung') {{ $message }} @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="#">Per hari</label>
                <input wire:model='per' value="hari" type="radio" name="radio-2" class="radio radio-primary"
                    checked="checked" />
                <label class="text-black" for="#">Per minggu</label>
                <input wire:model='per' value="minggu" type="radio" name="radio-2"
                    class="radio radio-primary" />
                <label class="text-black" for="#">Per bulan</label>
                <input wire:model='per' value="bulan" type="radio" name="radio-2"
                    class="radio radio-primary" />
            </div>
            @error('per') {{ $message }} @enderror
    
            <button wire:submit='createTabungan' class="btn">Buat</button>
        </form>
    </div>
    
</div>
