<div class="flex mr-4">
    @if(auth()->user())
        <div class="relative flex justify-between items-center " x-data="{

            dropdown :false,
            cart:false
}" @click.outside="cart = false">
            <button class="flex items-center" @click="dropdown = true" @click.outside="dropdown=false">
                <h3 class="text-black font-bold">Hi {{auth()->user()->name}}</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 ml-1" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </button>
            <ul x-show="dropdown" x-transition.opacity.duration.300ms
                class="absolute bg-gray-300 rounded shadow shadow-gray-400 md:top-8 md:right-12 top-8 -right-6 w-44 h-fit z-20">
                <li class="p-2 text-black hover:bg-gray-500 transition-all duration-200 ease-out hover:text-white cursor-pointer">
                    <a href="{{route('dashboard')}}" class="w-full">Dashboard</a>
                </li>
                <li class="p-2 text-black hover:bg-gray-500 transition-all duration-200 ease-out hover:text-white cursor-pointer">
                    <form method="post" action="{{route('logout')}}">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>

                </li>


            </ul>

            @role('customer')
            <button class="ml-4" @click="cart = true">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-600" fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
            </button>
            <div x-show="cart" x-transition.opacity.duration.200ms
                 class="absolute bg-yellow-700 rounded shadow shadow-gray-400 md:top-12 md:right-0 top-8 -right-32 w-80 h-fit p-2 z-20 ">

                            <span class="absolute top-2 right-2 cursor-pointer" @click="cart=false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
                            </span>
                <h1 class="text-white font-bold my-3 px-2">My Order</h1>
                <ul class="list-none flex flex-col">
                    @foreach($items as $item)
                        <li class="flex justify-between items-center p-2">
                            <div class="flex items-center">
                                <img src="{{\Illuminate\Support\Facades\Storage::url(\App\Models\Food::where('id','=',$item->id)->first()->image)}}" class="w-10 h-10 rounded-lg" alt="food">
                                <h2 class="ml-2 text-white">{{$item->name}}</h2>
                            </div>
                            <div>
                                <h5 class="text-white">{{$item->price}}</h5>
                            </div>

                            <span class="text-white font-semibold">{{$item->quantity}}</span>
                            <form action="{{route('RemoveCart',$item->id)}}" method="post">
                                @csrf
                                @method('delete')
                                            <button type="submit" class="rounded-[50%] cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                             fill="currentColor">
                                         <path fill-rule="evenodd"
                                               d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                               clip-rule="evenodd"/>
                                    </svg>
                                    </button>

                            </form>

                        </li>
                    @endforeach


                </ul>
                <hr>
                <div class="flex justify-between m-2">
                    <h3 class="text-white text-lg font-semibold">Total :</h3>
                    <span class="text-center text-white">{{\Cart::getTotalQuantity()}}</span>
                    <span class="text-white">{{\Cart::getTotal()}}</span>
                </div>
                <a href="{{route('checkout')}}">
                    <button
                        class="w-full bg-yellow-900 text-white rounded-lg shadow-gray-800 shadow drop-shadow py-2 hover:bg-yellow-300 hover:text-black transition-all duration-200 ease-in">
                        CheckOut
                    </button>
                </a>

            </div>
            @endrole
        </div>
    @else

        <a href="/login">
            <button class="btn-primary">Login</button>
        </a>
        <a href="/register">
            <button class="btn-primary">Sign Up</button>
        </a>

    @endif

</div>
