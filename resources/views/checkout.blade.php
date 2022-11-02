@extends('layouts.app')

@section('content')
<div class="mx-auto mt-10 mb-20 px-2" style="max-width:900px">
    <h1 class="text-center rounded-tr rounded-tl py-2  
            text-black  border-b-2 border-gray-400">Checkout</h1>
    <div class="flex xs:flex-col mt-8">
        
        <form method="POST" 
        class="w-7/12 mx-auto xs:w-full border-gray-400 mr-1 xs:mr-0" >
            @csrf
            <h2 class="text-center rounded-tr rounded-tl py-2 bg-gray-600 
            text-white  border-b-0 border-gray-400">Billing Details</h2>
            
            <div class="border p-5 px-2 rounded-br rounded-bl border-gray-400">

            <div class="flex flex-row xs:flex-col  w-full">
                <div class="mr-1 xs:mr-0 flex sm:w-1/2 w-full flex-col">
                    <label for="">First name</label>
                    <input type="text" autofocus class="py-1 rounded border border-gray-400 w-full">
                </div>
                <div class="ml-1 xs:ml-0 flex flex-col sm:w-1/2 w-full">
                    <label for="">Last name</label>
                    <input type="text" autofocus class="py-1 rounded border border-gray-400 w-full">
                </div>
            </div>
            <div class="flex flex-col">
                <label for="">Email address</label>
                <input type="text" class="py-1 rounded border border-gray-400 w-full">
            </div>

            <div class="flex flex-col">
                <label for="">Phone number</label>
                <input type="text" class="py-1 rounded border border-gray-400 w-full">
            </div>

            <div class="flex flex-col">
                <label for="">Address</label>
                <input type="text" class="py-1 rounded border border-gray-400 w-full">
            </div>
            
            <div>
                <div class="flex flex-col">
                    <label for="">Country</label>
                    <input type="text" class="py-1 rounded border border-gray-400 w-full">
                </div> 

                <div class="flex flex-col">
                    <label for="">state</label>
                    <input type="text" class="py-1 rounded border border-gray-400 w-full">
                </div>

                <div class="flex flex-col">
                    <label for="">LGA/City</label>
                    <input type="text" class="py-1 rounded border border-gray-400 w-full">
                </div>
            </div> 
            </div>
        </form>

        <div class="w-5/12 ml-1 xs:ml-0 xs:w-full xs:mt-5" x-data>
            <h2 class="flex justify-between items-center px-2 rounded-tr rounded-tl py-2 bg-gray-600 
            text-gray-700  border-b-0 border-gray-400">
                <span class="text-gray-200">Order summary</span>
                <span x-text="$store.cart.cart.totalQty" class="bg-gray-200 px-3 py- rounded-full"></span>
            </h2>
            <ul class="border p-2 rounded-bl rounded-br border-gray-400">
                <template x-for="item in $store.cart.cart.items">
                    <li class="flex justify-between">
                        <p x-text="item['item'].name"></p>
                        <p x-text="item['item'].price +' X '+ item.qty + ' = ' + item.total"></p>
                    </li>  
                </template>
                <li class="w-full mb-5 border-t border-gray-500">
                <div class="flex border-b border-gray-400 pb-2 justify-between">
                    <span>Cart Total</span>
                    <span x-text="$store.cart.cart.totalPrice"></span>
                </div>
                <div class="flex border-b border-gray-400 pb-2 justify-between">
                    <span>Shipping</span>
                    <span>Free</span>
                </div>
                <div class="flex border-b border-gray-400 pb-2 justify-between">
                    <span>Total</span>
                    <span x-text="$store.cart.cart.totalPrice"></span>
                </div>
                </li>  
            </ul>

            
            <button 
                class="mt-5 w-full hover:bg-green-600 block mb-5 hover:text-gray-200 
                text-white rounded bg-green-500 py-3">
                    Proceed to payment
            </button>
        </div>
    </div>
</div>

@endsection