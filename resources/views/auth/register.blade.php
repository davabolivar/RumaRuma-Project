<x-guest-layout>

    <div class="login h-screen">
        <div class="pt-[139px] pl-[168px] flex-col w-[630px]">
            <h1 class="font-bold text-[64px]">Register Here!</h1>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" class="border border-[#C69B7B] w-full py-4 px-[10px] bg-white my-2 rounded-lg" required>
                <label for="email">Password</label>
                <input type="password" name="password" placeholder="Enter password" class="border border-[#C69B7B] w-full py-4 px-[10px] my-2 rounded-lg" required>
                <label for="email">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Enter Password" class="border border-[#C69B7B] w-full py-4 px-[10px] my-2 rounded-lg" required>
                <div class="flex items-center">
                    <input type="checkbox" class="border-4 border-[#C69B7B] rounded-sm ml-1"><p class="text-2xl ml-[13px]">Remember me</p>
                </div>
                <button class="w-full bg-[#C69B7B] my-2 py-3 rounded-xl hover:bg-[#b48f72] transition-colors">
                    <p class="text-center text-base">Sign in</p>
                </button>
            </form>
            <button class="border border-[#C69B7B] w-full my-2 py-3 rounded-xl bg-white">
                <div class="flex items-center justify-center">
                    <img src="{{ asset('assets/images/GoogleIcon.png') }}" class="w-[30px]" alt="">
                    <p class="ml-[21px] text-base text-[#000]/40">Sign in with Google</p>
                </div>
            </button>
            <a href="{{ route('login') }}"><p class="text-center text-blue-500">Already have an account? Login here</p></a>
        </div>
    </div>

</x-guest-layout>
