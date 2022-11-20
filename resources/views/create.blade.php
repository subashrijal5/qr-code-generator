{{-- <x-app-layout> --}}
    {{-- <x-slot name="header"> --}}
        {{-- </x-slot> --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create Qr Code') }}
            </h2>
            <div class="block p-6 rounded-lg shadow-lg bg-white max-w-sm">
                <form action="{{route('generate')}}">
                    <div class="form-group mb-6">
                        <label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
                        <input type="text" name="name" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0
                      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" id="name"
                            aria-describedby="nameHelp" placeholder="Enter Name">
                        <small id="nameHelp" class="block mt-1 text-xs text-gray-600">test</small>
                    </div>
                    <div class="form-group mb-6">
                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Text to generate QR
                            Code</label>
                        <textarea name="data" id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your message..."></textarea>
                            <small id="nameHelp" class="block mt-1 text-xs text-gray-600"></small>
                    </div>

                    <button type="submit" class="
                    px-6
                    py-2.5
                    bg-blue-600
                    text-white
                    font-medium
                    text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Submit</button>
                </form>
            </div>
        </div>
    </div>

{{-- </x-app-layout> --}}
