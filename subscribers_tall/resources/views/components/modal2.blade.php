@props(['trigger'])

<div class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-screen" 
     x-show="{{ $trigger }}"
     x-on:click.self="{{ $trigger }} = false" 
     x-on:keydown.escape.window="{{ $trigger }} = false">
    <div {{ $attributes->merge(['class' => 'bg-gray-500 mx-auto shadow-2xl rounded-xl p-8']) }}>
        {{ $slot }}
    </div>
</div> <!--Subscribe Modal End -->
