@extends('layouts.app')


@section('content')
<div x-data="{open: false}">    
    <h1 style="width:200px" x-on:click="open = ! open" 
    x-bind:class="open ? 'rounded-br-none': 'rounded-br-full rounded-bl-full'" 
    class="shadow border-t-0 cursor-pointer border border-gray-400 px-4 
    pb-1 mx-auto w-3/5 text-center flex justify-between items-center">
    User dashboard <span class="fas fa-chevron-down"></span></h1>
    <div style="width:200px" x-show="open" x-on:click.outside="open = false" class="rounded-br flex flex-col
    rounded-bl border-t-0 border border-gray-400 shadow py-2 border mx-auto w-3/5 text-center">
        <a class="pb-1" href="#">
            My Orders
        </a>
        <a class="py-1 border-y border-gray-400" href="#">
            My Profile
        </a>
        <a class="py-1" href="#">
            My Address
        </a>
    </div>
</div>
@endsection('content')
