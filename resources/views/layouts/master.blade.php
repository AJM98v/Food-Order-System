@include('layouts.head')

@if(Session::has('message'))
    <div x-data="{

               modal : true
        }" x-show='modal' x-init="setTimeout(() => modal = false,3000)" x-transition.opacity.duration.500ms
         class="w-72 rounded shadow drop-shadow shadow-gray-700 h-fit p-2 fixed bg-green-700 bottom-4 right-4">
        <h3 class="font-bold  text-white">{{Session::get('message')}}</h3>
    </div>
@endif

<main class="flex flex-col mt-5 mx-4 sm:mx-20 bg-gray-300 rounded shadow shadow-gray-400 h-fit p-10">

    @yield('content')

</main>


@include('layouts.footer')
