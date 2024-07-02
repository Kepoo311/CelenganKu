@push('title','Register')


<div class="flex items-center justify-center min-h-screen">
        <div class="bg-zinc-300 p-8 rounded-lg shadow-lg w-96 mb-16">
          <h2 class="text-2xl font-bold text-center mb-6 text-black">Register</h2>
          <form wire:submit = 'register'>
            <div class="mb-4">
              <label class="block text-black mb-2" for="username">Username</label>
              <input wire:model='name' type="text" id="username" class="input input-bordered w-full" placeholder="Enter your username" />
              @error('name') {{ $message }} @enderror
            </div>
            <div class="mb-4">
              <label class="block text-black mb-2" for="password">Password</label>
              <input wire:model='password' type="password" id="password" class="input input-bordered w-full" placeholder="Enter your password" />
              @error('password') {{ $message }} @enderror
            </div>
            <div class="mb-6">
              <label class="block text-black mb-2" for="confirm-password">Confirm password</label>
              <input wire:model='password_confirmation' type="password" id="confirm-password" class="input input-bordered w-full" placeholder="Confirm your password" />
              @error('password_confirmation') {{ $message }} @enderror
            </div>
            <button wire:submit='register' type="submit" class="btn border-0 w-full bg-blue-500 hover:bg-blue-600 text-black"><span wire:loading.remove>REGISTER</span><span wire:loading class="loading loading-infinity loading-lg"></span></button>
            <p class="text-black">Already have account? <a class="text-blue-500" href="login">Login</a></p>
        </form>
        </div>
</div>
