<div x-data="{
        result : false
}" @click.outside="result = false" class="relative rounded flex bg-white p-2 w-80  md:w-96 my-3 md:m-1 items-center">
    <input type="text" name="search" id="search" class="outline-none border-none placeholder-gray-300 w-full"
           placeholder="Search..?!" wire:model.debounce.400ms="search" @focus="result = true"
           @focusout="result = false">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
    </svg>


    <div x-show="result" x-transition.opacity.duration.300ms
         class="absolute w-80 p-2 md:w-96 top-14  left-0 h-fit bg-white z-20">
        @if($results === null)
            <h1 class="text-center font-semibold text-lg">No Result Find</h1>
        @else
            <ul class="list-none flex flex-col m-1 ">
                @foreach($results as $result)
                    @if($loop->index < 4)
                        <li class="text-lg text-center font-bold  hover:bg-gray-100 transition-all duration-200 cursor-pointer">
                           <a href="{{route('food',$result)}}" class="flex items-center">
                               <img src="{{Storage::url($result->image)}}"
                                    alt="photo"
                                    class="w-10 h-10 rounded-xl m-1 shadow shadow-gray-700">
                               <h2 class="pl-2 text-xl">{{$result->name}} </h2>
                           </a>

                        </li>
                    @endif
                @endforeach
            </ul>
        @endif


    </div>
</div>
