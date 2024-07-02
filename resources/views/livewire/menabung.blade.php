@push('title','Tabungan mu')

<div class="min-h-screen flex justify-center">
    <div class="bg-zinc-300 h-fit w-fit p-5 my-3 rounded-lg shadow-xl shadow-blue-100">
        <div class="grid grid-rows-1 gap-5 justify-items-center">
            <h1 class="mt-5 text-black font-bold text-3xl">{{ $tabungan->nama }}</h1>

            <div class="max-w-3xl bg-zinc-400 rounded-lg">
                <img src="{{ asset('photos/' . $tabungan->target_photo) }}" alt="landscape"
                    class="rounded-t-lg w-[400px] h-[200px]" />
                <div class="p-4">
                    <p class="text-xl text-black">Rp. {{ number_format($tabungan->jumlah_tabungan, 0, ',', '.') }} / Rp.
                        {{ number_format($tabungan->target_tabungan, 0, ',', '.') }}</p>
                    <p class="text-black text-xl">Tercapai:
                        {{ ($tabungan->target_tabungan - $tabungan->jumlah_tabungan) / $tabungan->jumlah_nabung }}
                        {{ $tabungan->per }}</p>
                    <div class="flex justify-end mt-4">
                        <div class="radial-progress text-black"
                            style="--value:{{ ($tabungan->jumlah_tabungan / $tabungan->target_tabungan) * 100 }};"
                            role="progressbar">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="text-center">
                                    <span
                                        class="block text-lg text-black font-bold">{{ ($tabungan->jumlah_tabungan / $tabungan->target_tabungan) * 100 }}%</span>
                                    <span class="text-xs text-black">Progress</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($tabungan->jumlah_tabungan >= $tabungan->target_tabungan)
            <div class="w-[400px] h-fit bg-zinc-400 rounded-lg p-5">
                <p class="text-lg text-black font-bold mb-4">Target terpenuhi! Hapus tabungan?</p>
                <form wire:submit='delete'>
                    <button wire:submit='delete' class="btn btn-active mt-3 w-full text-white">DELETE</button>
                </form>
            </div>
            @endif
            
            <div class="w-[400px] h-fit bg-zinc-400 rounded-lg p-5">
                <p class="text-lg text-black font-bold">Masukkan nominal :</p>
                <form wire:submit='update'>
                    <input wire:model='nominal' id="inputNom" type="text" placeholder="Type here"
                        class="input input-bordered w-full" />
                    @error('nominal')
                        <p class="text-black">{{ $message }} </p>
                    @enderror
                    <div class="flex gap-7">
                        <a wire:click='setNominal(10000)' class="btn btn-active text-blue-600 mt-3">Rp. 10.000</a>
                        <a wire:click='setNominal(50000)'class="btn btn-active text-blue-600 mt-3">Rp. 50.000</a>
                        <a wire:click='setNominal(100000)' class="btn btn-active text-blue-600 mt-3">RP. 100.000</a>
                    </div>
                    <div class="flex space-x-4 justify-center pt-3">
                        <label class="cursor-pointer">
                            <input wire:model='options' value="plus" type="radio" name="options"
                                class="hidden peer" />
                            <div class="bg-black text-white py-2 px-4 rounded-lg peer-checked:bg-gray-800">+ DITAMBAH
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input wire:model='options' value="minus" type="radio" name="options"
                                class="hidden peer" />
                            <div class="bg-black text-white py-2 px-4 rounded-lg peer-checked:bg-gray-800">-
                                DIKURANGI</div>
                        </label>
                    </div>
                    @error('options')
                        <p class="text-black">{{ $message }} </p>
                    @enderror

                    <button wire:submit='update' class="btn btn-active mt-3 w-full">Update</button>
                </form>
            </div>

            <div class="w-[400px] h-fit bg-zinc-400 rounded-lg p-5">
                <p class="text-lg text-black font-bold mb-4">Riwayat</p>

                @forelse ($riwayat as $item)
                    @if ($item->options == 'plus')
                        <div class="bg-blue-500 text-black p-4 mb-2 rounded-lg w-full">
                            <div class="text-md font-bold mb-2">+ Rp. {{ number_format($item->nominal, 0, ',', '.') }}
                            </div>
                            <hr class="border-black my-2" />
                            <div class="text-md">{{ $item->created_at }}</div>
                        </div>
                    @else
                        <div class="bg-red-500 text-black p-4 mb-2 rounded-lg w-full">
                            <div class="text-md font-bold mb-2">- Rp. {{ number_format($item->nominal, 0, ',', '.') }}
                            </div>
                            <hr class="border-black my-2" />
                            <div class="text-md">{{ $item->created_at }}</div>
                        </div>
                    @endif
                @empty
                    <div class=" text-black p-4 rounded-lg w-full">
                        <div class="text-md font-bold mb-2">EMPTY</div>
                    </div>
                @endforelse

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var jum_tabungan = {{ $tabungan->jumlah_tabungan }};
        var target = {{ $tabungan->target_tabungan }};

        if (jum_tabungan >= target) {
            Swal.fire({
                title: "Kerja bagus!",
                text: "Target mu sudah terpenuhi!",
                icon: "success"
            });
        }
    </script>
</div>
