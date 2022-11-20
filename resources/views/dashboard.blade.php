<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{open:false,  toggle() { console.log(this.open), this.open = !this.open }}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-x-auto relative py-3">
                <h2 class="text-2xl font-bold ">Qr Codes</h2>
                <x-primary-button class="float-right" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Create New</x-primary-button>

                <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    @include('create')
                </x-modal>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Image</span>
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Content
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($qrcodes as $qrcode)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 w-35">
                                {{QrCode::size(100)->generate($qrcode->data)}}
                            </td>
                            <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                {{$data->name ?? 'Unknown'}}
                            </td>
                            <td class="py-4 px-6">
                                {{$qrcode->data ?? ''}}
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{route('download', $qrcode->id)}}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Download</a> ||
                                <a href="{{route('remove', $qrcode->id)}}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
                            </td>
                        </tr>
                        @empty
                        <td class="py-4 px-6">
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">No Data
                                Available</a>
                        </td>
                        @endforelse

                    </tbody>

                </table>
            </div>
            {{$qrcodes->links()}}
        </div>
    </div>
</x-app-layout>
