@extends('layouts.app')

@section('content')
<main>
    <div class="image-box" 
		style="background-image: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.7)), url(logo.png)">
		<h1 class="font-bold mb-3 ">{{ config('app.name') }}&reg; </h1>
		<p>Luxury Clothing</p>
    </div>

    <div class="flex my-8 px-2">
        <div class="w-1/6">
            <div class="shadow border p-2 rounded">
                <img src="/logo.png" alt="">

                <p>NGN20000</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit</p>
                
                <button class="px-2 py-1 rounded bg-yellow-500 w-full">
                    
                    
                    Add to Carts
                </button>
            </div>
        </div>
    </div>
</main>
@endsection