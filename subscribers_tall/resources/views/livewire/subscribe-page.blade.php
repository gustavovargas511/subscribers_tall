<div class="flex flex-col bg-gradient-to-r from-[#3b41c5] via-[#a981bb] to-[#ffc8a9] w-full h-screen"
     x-data="{
        isOpenModal: false,
        showSuccess: false,
}">
    <nav class="flex pt-5 justify-between container mx-auto text-pink-100">
        <a class="text-3xl font-bold" 
           href="/">
            <x-application-logo class="w-16 h-16 fill-white">
            </x-application-logo>
        </a>
        <div class="flex justify-end">
            @auth
                <a href="{{ route('dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}">Login</a>
            @endauth
        </div>
    </nav>
    <div class="flex container mx-auto items-center h-full">
        <div class="flex flex-col w-1/3 items-start">
            <h1 class="text-pink-100 font-bold text-6xl leading-tight">
                Subscribe!
            </h1>
            <p class="text-indigo-300 text-xl mb-5">
                This page was made with TALL Stack.
            </p>
            <x-primary-button class="bg-red-400 hover:bg-red-500 py-4" 
                              x-on:click="isOpenModal = true">
                Subscribe
            </x-primary-button>
        </div>
    </div>

    <x-modal2 class="bg-gradient-to-r from-[#3b41c5] via-[#a981bb] to-[#ffc8a9]"
              trigger="isOpenModal"><!--Subscribe Modal Start-->
        <p class="text-white text-5xl font-extrabold text-center">
            Let's get in touch!
        </p>
        <form class="flex flex-col items-center mt-5" 
              wire:submit.prevent='subscribe'>
            <x-text-input class="px-5 py-3 w-80 border border-blue-400" 
                          type="email" 
                          name="email"
                          placeholder="Email address" 
                          wire:model='email'>
            </x-text-input>
            <span class="text-gray-100 mt-1 text-xs">
                {{ $errors->has('email') ? 
                   $errors->first('email') : 
                   'You will receive a confirmation email.' 
                }}
            </span>
            <x-primary-button class="px-5 py-5 w-80 justify-center mt-5 bg-red-400 hover:bg-red-500">
                Let me in !!!
            </x-primary-button>
        </form>
    </x-modal2><!--Subscribe Modal End-->

    <x-modal2 class="bg-green-500"
              trigger="showSuccess"> <!--Success Modal Start-->
        <p class="text-white animate-pulse text-9xl font-extrabold text-center">
            &check;
        </p>
        <p class="text-white text-3xl font-extrabold text-center">
            Mail sent!
        </p>
    </x-modal2><!--SuccessModal Start-->
</div>
