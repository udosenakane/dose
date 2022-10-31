@extends('layouts.app')

@section('content')

<form x-data style="max-width: 600px" class="shadow border rounded px-5 mx-auto my-10 w-full">
    <h1 class="text-center mx-3 sm:mx-0 mb-5 border-b-2 border-gray-300 py-2 uppercase">Shopping Cart</h1> 
    <ul> 
            <template x-for="item in $store.cart.cart.items">
                <li class="flex flex-col border rounded relative mb-5">
                    <p style="height:25px" class="px-2 overflow-hidden bg-gray-200">
                        <a x-bind:href="/products/+item['item'].slug" x-text="item['item'].name"></a>
                    </p>
                    <div class="flex items-center">
                        <a x-bind:href="/products/+item['item'].slug">
                            <img width="100" height="100" class="m-auto border-r ounded" 
                                x-bind:src="'/storage/files/'+item['item'].images[0].lg" 
                                x-bind:alt="item['item'].name">
                        </a>
                        <div class="w-4/5">
                            <p class="pl-3">
                                <span class="key">Price:</span> 
                                <span class="val" x-text="item['item'].name"></span>
                            </p>

                            <div class="border-b border-t flex w-full py-1 pl-3">
                                <span class="key xs:hidden">Quantity:</span> 
                                <span class="key sm:hidden">Qty:</span> 

                                <div class="ml-4 flex items-center">
                                    <span style="font-size:20px" x-on:click="$store.cart.decrementItem(item)"
                                    class="cursor-pointer text-green-400 fas fa-minus-square"></span>
                                    <input style="width:51px" x-bind:value="item.qty"  class="mx-2 pl-5 shadow rounded border"/>
                                    <span style="font-size:20px" x-on:click="$store.cart.addItem(item)" 
                                    class="cursor-pointer text-green-400 fas fa-plus-square"></span>
                                </div>
                            </div>

                            <p class="pl-3">
                                <span class="key">SubTotal:</span>
                                <span class="val" x-text="item.total"></span>
                            </p>
                        </div>

                        <div x-on:click="$store.cart.deleteItem(item['item'])"
                        style="font-size:19px;top:-18px;right:-5px" 
                        class="cursor-pointer absolute text-red-500">
                            <span class="fas fa-times-circle"></span>
                        </div>
                    </div>
                </li>   
            </template>

            <li class="w-full mb-5 border-t border-gray-500">
                <div class="flex border-b border-gray-400 pb-2 justify-between">
                    <span>Line Total</span>
                    <span x-text="$store.cart.cart.totalPrice"></span>
                </div>
                
            </li>  

            <li>
                <button class="w-full hover:bg-green-600 mb-5 hover:text-gray-200 text-white rounded bg-green-500 py-3">
                    Proceed to checkout
                </button>
            </li>
    </ul>
   
</form>

@endsection