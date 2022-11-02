<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <!-- <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap"> -->
        <link rel="stylesheet" href="/dev/fontawesome/css/all.css">
        @if(request()->route()->getName() == 'products.create')
        <script src="https://cdn.tiny.cloud/1/uh2x3ha4bm2dmcmaq3itotcetfl3ab1aygudhjm49al61ong/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        @endif
        <!-- Scripts -->
        <script src="/dev/fontawesome/js/all.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('layouts.navigation')
        <div class="flex xs:flex-col my-10">
            <div class="w-1/5">
                <ul class="mx-2">
                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">Products</a>
                        <ul class="ml-5" x-show="open" x-on:click.outside="open = false"> 
                            <li>
                                <a href="{{route('admin.products.index')}}">All Products</a>
                            </li>
                            <li>
                                <a href="{{route('admin.products.create')}}">Add Product</a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">Orders</a>
                        <ul class="ml-5" x-show="open" x-on:click.outside="open = false"> 
                            <li>
                                <a href="{{route('admin.products.index')}}">All Orders</a>
                            </li>
                            <li>
                                <a href="{{route('admin.products.create')}}">Add Order</a>
                            </li>
                        </ul>
                    </li>
                    <li x-data="{ open: false }">
                        <a x-on:click="open = ! open" href="#">Customers</a>
                        <ul class="ml-5" x-show="open" x-on:click.outside="open = false"> 
                            <li>
                                <a href="{{route('admin.products.index')}}">All Customers</a>
                            </li>
                            <li>
                                <a href="{{route('admin.products.create')}}">Add Customers</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="w-4/5 p-2 xs:w-full">
            @yield('content')
            </div>
        </div>

        <footer class="w-full fixed bottom-0 bg-white">
            {{-- storage_path('/app/public/files/') --}}
            <p class="text-center py-2 border-t border-gray-400">{{date('Y')}} | {{config('app.name')}}&reg;</p>
        </footer>

        @yield('script')
    </body>
</html>
