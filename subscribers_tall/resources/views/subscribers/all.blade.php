<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-2xl text-gray-600 font-bold mb-6 underline">
                        Subscribers
                    </p>
                    @if ($subscribers->isEmpty())
                        <div class="flex w-full border p-6 rounded-md">
                            <p class="text-red-700">No subscribers found.</p>
                        </div>
                    @else
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="px-6 py-3">Email</th>
                                    <th class="px-6 py-3">Verified?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $sub)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">
                                        {{$sub->email}}</td>
                                    <td class="px-6 py-4">
                                        @if (is_null($sub->email_verified_at))
                                            Not verified yet
                                        @else
                                            {{$sub->email_verified_at->diffForHumans()}}</td>
                                        @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
