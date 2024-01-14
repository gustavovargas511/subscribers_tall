<div class="p-6 text-gray-900 dark:text-gray-100">
    <p class="text-2xl text-gray-600 font-bold mb-6 underline">
        Subscribers
    </p>
    <div class="px-5">
        <input type="text"
                       class="rounded-lg border float-right border-gray-300 mb-4 pl-8 w-1/3"
                       placeholder="Search"
                       wire:model.live='search'>
        @if ($subscribers->isEmpty())
            <div class="flex w-full border p-6 rounded-md">
                <p class="text-red-700">No subscribers found.</p>
            </div>
        @else
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="border-b-2">
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Verified?</th>
                        <th class="px-4 py-2 text-center">Actions</th </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $sub)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-4 py-4">
                                {{ $sub->email }}</td>
                            <td class="px-4 py-4">
                                @if (is_null($sub->email_verified_at))
                                    Not verified yet
                                @else
                                    {{ $sub->email_verified_at->diffForHumans() }}
                            </td>
                            <td class="px-4 py-4">
                                <x-primary-button class="border border-red-600 text-red-700 bg-red-50 hover:bg-red-300"
                                    wire:click='delete({{ $sub->id }})'>
                                    Delete
                                </x-primary-button>
                            </td>
                    @endif
                    </tr>
        @endforeach
        </tbody>
        </table>
        @endif
    </div>
</div>
