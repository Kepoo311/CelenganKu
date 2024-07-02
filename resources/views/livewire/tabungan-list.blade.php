@push('title','Tabungan list')

<div class="min-h-screen">
    <a href="/celengan/buat" class="btn btn-primary m-5">Nabung</a>

    <div class="m-5 grid grid-cols-2 gap-4 lg:grid-cols-4">
        @forelse ($tabungan as $item)
        <a href="/celengan/nabung/{{$item->id}}" class="max-w-xs rounded-lg shadow-lg bg-zinc-300 hover:bg-zinc-400 duration-500">
            <img src="{{asset('photos/'.$item->target_photo)}}" alt="landscape" class="rounded-t-lg" />
            <div class="p-4">
                <h2 class="text-lg font-bold text-black">{{$item->nama}}</h2>
                <p class="text-sm text-gray-600">Rp. {{ number_format($item->jumlah_tabungan, 0, ',', '.') }} / Rp. {{ number_format($item->target_tabungan, 0, ',', '.') }}</p>
                <p class="text-gray-600 text-lg">Tercapai : {{($item->target_tabungan - $item->jumlah_tabungan) / $item->jumlah_nabung}} {{$item->per}}</p>
                <div class="flex justify-end mt-4">
                    <div class="radial-progress text-primary" style="--value:{{($item->jumlah_tabungan / $item->target_tabungan) * 100}};" role="progressbar">
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="text-center">
                                <span class="block text-lg text-black font-bold">{{($item->jumlah_tabungan / $item->target_tabungan) * 100}}%</span>
                                <span class="text-xs text-black">Progress</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @empty
            <p>EMPTY</p>
        @endforelse
    </div>

    
</div>
