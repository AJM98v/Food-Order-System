<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Order</title>
    @livewireStyles()

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>


</head>

<body class="bg-gray-200">

<header class="flex flex-col md:flex-row justify-between m-3 items-center">
    <div class="flex justify-center items-center ">
        <button class="ring-gray-400 shadow shadow-gray-600 rounded px-4 py-1 bg-white mr-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"/>
            </svg>
        </button>
        <a href="/"><h1 class="font-bold text-lg text-gray-800 uppercase">Food Order</h1></a>
    </div>


    @livewire('search')


    @livewire('user-nav')


</header>

