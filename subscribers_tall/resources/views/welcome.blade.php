<x-guest-layout>
    <div class="flex flex-col bg-rose-600 w-full h-screen">
        <nav class="flex pt-5 justify-between container mx-auto text-pink-100">
            <a class="text-3xl" href="/">
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
    </div>
    <div class="flex flex-col bg-pink-400 w-full h-screen">

    </div>
</x-guest-layout>
