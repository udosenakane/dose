@extends('layouts.app')

@section('content')
    <div style="max-width:600px" class="flex xs:flex-col mx-auto items-center">
        <div class="fle">
        <p class="sm:hidden block mb-4">{{$product->name}}</p>
        
        <img class="rounded shadow border" src="{{ asset('storage/files/'.unserialize($product->images)[0]['lg']) }}" alt="">
        </div>

        <div class="ml-10 xs:w-full">
            <p class="sm:block hidden">{{$product->name}}</p>
            <p class="my-10">Price: {{$product->price}}</p>
            <p>Category: {{$product->category->name}}</p>

            <button class="mt-10 bg-yellow-400 rounded px-20 py-2">
                Add to cart
            </button>
        </div>
    </div>
@endsection