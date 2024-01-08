    <!--Success Modal Start-->
    <div class="flex fixed top-0 bg-gray-900 bg-opacity-60 items-center w-full h-screen" 
         x-show="showSuccess"
         x-on:click.self="showSuccess = false" 
         x-on:keydown.escape.window="showSuccess = false">
        <div class="bg-green-500 mx-auto shadow-2xl rounded-xl p-8">
            {{$slot}}
        </div>
    </div> <!--SuccessModal Start-->