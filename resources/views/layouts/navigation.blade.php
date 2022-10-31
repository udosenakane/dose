<header>
            <nav style="height:52px" class="p-3 py-2 sm:px-6 flex justify-between border-b border-gray-400 items-center">
                <ul class="flex items-center">
                    <li>
                        <a class="fa-size  text-gray-600" href="#">
                            <span class="fas fa-bars"></span>
                        </a>
                    </li>
                    
                    <li class="mx-7">
                        <a class="fa-size  text-gray-600" href="{{route('products.index')}}">
                            <span class="fas fa-store"></span>
                        </a>
                    </li>

                    <li >
                        <a class="fa-size  text-gray-600" href="{{route('products.index')}}">
                        <img src="/logo.png" style="height:25px;width:50px" alt="">
                        </a>
                    </li>
                </ul>

                <form action="{{ route('search') }}" method="post" 
                class="flex-grow mx-4 sm:block hidden">
                    @csrf
                    <input type="text" placeholder="Search {{config('app.name')}}..." name="search" 
                    class="py-1 border border-gray-400 rounded w-full">
                </form>
                <!-- <a href="#" class="sm:hidden mx-auto">HOME</a> -->

                <ul class="flex items-center">
                    <li x-data="{ open : false }" style="font-size:22px;height:30px" 
                    class="ml-3 border-gray-400 border px-1 py-0 rounded
                     flex text-gray-500 items-center relative">
                        <!-- <span></span>&nbsp; -->
                        <div class="cursor-pointer flex items-center" x-on:click="open = ! open" > 
                            <span>{{country()->emoji}}</span>&nbsp;
                            <span class="fas fa-chevron-down"></span>
                        </div>

                        
                        <form x-show="open" x-on:click.outside="open = false" x-data="countries"
                        style="top:30px;width:210px;z-index:2000" 
                        class="bg-white border p-2 rounded right-0 mx-auto absolute top-0 w-full">
                            <input type="text" x-model="search" 
                            x-on:input.debounce="getCountries" style="height:30px" 
                            placeholder="Select Country..." class="px-3 py-1 border w-full rounded border-gray-400">
                            <ul>
                            <template x-for="country in countries">
                                <li>
                                    <a x-bind:href="'/country/'+country.iso2">
                                        <span x-text="country.emoji"></span>
                                        <span x-text="country.name"></span>
                                    </a>
                                </li>
                            </template>    
                            </ul>
                        </form>
                    </li>
    
                    <li class="mx-6 relative">
                        <a class="fa-size text-gray-600" href="{{route('cart.index')}}">
                            <span class="fas fa-shopping-cart"></span>
                            <div style="top:-6px;right:-12px;height:20px;font-weight:bold" 
                                class="absolute rounded-full bg-red-400 
                                text-white py-0 px-2 flex items-center text-xs">
                                <span x-data x-text="$store.cart.cart? $store.cart.cart.totalQty: 0"></span>
                            </div>
                        </a>
                    </li>

                    <li x-data="{ open : false }" class="relative">
                        <a X-on:click="open = ! open" class="fa-size  text-gray-600" href="#">
                            <span class="fas fa-user"></span>
                        </a>

                        <ul x-show="open" x-on:click.outside="open = false" 
                        class="absolute bg-white rounded borde border-gray-400" 
                        style="top:40px;right:0;width:170px;">
                            <li class="border px-3 py-1 border-gray-400">
                                <a href="{{route('login')}}">Log in</a>
                            </li>
                            <li class="border border-t-0 px-3 py-1 border-gray-400">
                                <a href="{{route('register')}}">Sign up</a>
                            </li>
                            <li class="border border-t-0 rounded-bl rounded-br px-3 py-1 border-gray-400">
                                <a href="{{route('password.request')}}">Forgot Password?</a>
                            </li>
                        </ul>
                    </li>         
                </ul>
            </nav>

             <form action="{{ route('search') }}" method="post" 
                class="flex-grow sm:hidden block px-3 p-2 border-b border-gray-400 w-full">
                    @csrf
                    <input type="text" style="height:30px" placeholder="Search {{config('app.name')}}..." name="search" 
                    class="py-0 border border-gray-400 rounded w-full">
                </form>
        </header>

       