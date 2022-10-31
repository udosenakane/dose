@extends('layouts.app')

@section('content')
<main class="p-2 sm:p-6">
    @if(count($products))
    @foreach($products->chunk(4) as $chunk)
    <div class="flex">
            
        @foreach($chunk as $product)
                <div class="w-1/4">
                    <div  class="border shadow rounded m-3 p-3">
                    <a href="{{route('products.show', $product) }}">

                    <img src="{{ asset('storage/files/'.$product->images[0]['lg']) }}" 
                    alt="{{ $product->slug }}">
                    </a>
                    <p class="border-t border-b py-1">{{ $product->name }}</p>
                    <p>{{ $product->price }}</p>

                    <button x-data x-on:click="$store.cart.addItem({{$product}})" type="button"
                        class="hover:bg-yellow-300 active:bg-yellow-600 
                        bg-yellow-500 py-1 rounded px-2 w-full">
                            Add to cart
                    </button>
                    
                    </div>
                    
                </div>
        @endforeach
        </div>

    @endforeach

    @else
    @endif
</main>
@endsection