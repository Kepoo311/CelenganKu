@push('title','Asyik target baru')

<div class="min-h-screen flex justify-center items-center">

    <div class="bg-zinc-300 mb-16 p-3 rounded-lg">
        <h1 class="mx-2 font-bold text-black text-2xl">Buat Celengan</h1>
        <form class="p-2" wire:submit='createTabungan'>
            <div class="mb-2">
                <label class="text-black" for="file">Upload foto target mu</label>
                <input wire:model='target_photo' type="file"
                    class="file-input file-input-bordered w-full" />
                @error('target_photo') <p class="text-black"> {{ $message }} </p> @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="nama">Nama celengan</label>
                <input wire:model='nama' type="text" placeholder="Type here"
                    class="input input-bordered block w-full" />
                    @error('nama') <p class="text-black"> {{ $message }} </p> @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="target">Target celengan</label>
                <input wire:model='target_tabungan' type="text" placeholder="Ex. 1.000.000"
                    class="input input-bordered block w-full" />
                    @error('target_tabungan') <p class="text-black"> {{ $message }} </p> @enderror
            </div>
            <div class="mb-2">
                <label class="text-black" for="target">Jumlah nabung</label>
                <input wire:model='jumlah_nabung' type="text" placeholder="Ex. 50.000"
                    class="input input-bordered block w-full" />
                    @error('jumlah_nabung') <p class="text-black"> {{ $message }} </p> @enderror
            </div>
            <div class="flex space-x-4 justify-center pt-3">
                <label class="cursor-pointer">
                    <input wire:model='per' value="hari" type="radio" name="per"
                        class="hidden peer" />
                    <div class="bg-black text-white py-2 px-4 rounded-lg peer-checked:bg-gray-800">Per hari
                    </div>
                </label>
                <label class="cursor-pointer">
                    <input wire:model='per' value="minggu" type="radio" name="per"
                        class="hidden peer" />
                    <div class="bg-black text-white py-2 px-4 rounded-lg peer-checked:bg-gray-800">Per minggu</div>
                </label>
                <label class="cursor-pointer">
                    <input wire:model='per' value="bulan" type="radio" name="per"
                        class="hidden peer" />
                    <div class="bg-black text-white py-2 px-4 rounded-lg peer-checked:bg-gray-800">Per bulan</div>
                </label>
            </div>
            @error('per') <p class="text-black"> {{ $message }} </p>@enderror
    
            <button wire:submit='createTabungan' class="btn">Buat</button>
        </form>
    </div>
    
</div>
