<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(Session::has('message'))
        <div x-data="{

               modal : true
        }" x-show='modal' x-init="setTimeout(() => modal = false,2000)" x-transition.opacity.duration.500ms
             class="w-72 rounded shadow drop-shadow shadow-gray-700 h-fit p-4 fixed bg-green-700 top-[50%] right-[50%] translate-y-[-50%] translate-x-[50%]">
            <h3 class="font-bold text-lg text-white">{{Session::get('message')}}</h3>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                @yield('content')

            </div>
        </div>
    </div>
</x-app-layout>
