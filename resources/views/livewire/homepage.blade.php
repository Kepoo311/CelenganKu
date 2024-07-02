@push('title','Home')

<div>
    <div class="hero bg-gray-200 min-h-screen">
        <div class="hero-content flex-col lg:gap-52 lg:flex-row-reverse pb-28">
          <img
            src="{{asset('img/undraw_savings_re_eq4w.svg')}}"
            class="max-w-sm" />
          <div>
            <h1 class="text-5xl text-black font-bold">CelenganKu</h1>
            <p class="py-6 text-gray-600">
              Catat jumlah tabungan-mu dengan CelenganKu!
            </p>
            @auth
            <a href="/celengan/user/{{auth()->user()->id}}" class="btn btn-primary">Get Started</a>
            @else
            <a href="/login" class="btn btn-primary">Get Started</a>
            @endauth
          </div>
        </div>
      </div>
</div>
