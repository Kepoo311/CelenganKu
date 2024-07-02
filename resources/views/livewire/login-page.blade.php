@push('title', 'Login')

<div class="flex items-center justify-center min-h-screen">
    <div class="bg-zinc-300 p-8 rounded-lg shadow-lg w-96 mb-16">
        <h2 class="text-2xl font-bold text-center mb-6 text-black">Login</h2>
        <form wire:submit='login'>
            <div class="mb-4">
                <label class="block text-black mb-2" for="username">Username</label>
                <input wire:model='name' type="text" id="username" class="input input-bordered w-full"
                    placeholder="Enter your username" />
                    @error('name') {{ $message }} @enderror
            </div>
            <div class="mb-4">
                <label class="block text-black mb-2" for="password">Password</label>
                <input wire:model='password' type="password" id="password" class="input input-bordered w-full"
                    placeholder="Enter your password" />
                    @error('password') {{ $message }} @enderror
            </div>
            <button wire:submit='login' type="submit"
                class="btn border-0 w-full bg-blue-500 hover:bg-blue-600 text-white"><span
                    wire:loading.remove>LOGIN</span><span wire:loading
                    class="loading loading-infinity loading-lg"></span></button>
            
            <p class="text-black">Dont have account? <a class="text-blue-500" href="register">Register</a></p>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let error = {{ session()->has('failed') ? 1 : 0 }}
        let errorMsg = @json(session('failed'))

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        });

        if (error) {
            Toast.fire({
                icon: 'error',
                title: errorMsg,
            })
        }
    </script>
    <style>
        .colored-toast.swal2-icon-info {
            background-color: #3fc3ee !important;
        }

        .colored-toast.swal2-icon-error {
            background-color: #f27474 !important;
        }

        .colored-toast .swal2-title {
            color: white;
        }

        .colored-toast .swal2-close {
            color: white;
        }

        .colored-toast .swal2-html-container {
            color: white;
        }
    </style>
</div>
