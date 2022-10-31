@extends('layouts.app')


@section('content')
    <form method="POST" style="max-width:500px" class="mx-auto borde p-5 px-2 border-gray-400" action="{{ route('login') }}">
        @csrf
        <h1 class="text-center rounded-tr rounded-tl py-2 bg-gray-600 text-white mt-10  border-b-0 border-gray-400">Log in</h1>
        
        <div class="border p-5 px-2 rounded-br rounded-bl border-gray-400">

        <div class="flex flex-col">
            <label for="">Email or phone number</label>
            <input type="text" autofocus class="py-1 rounded border border-gray-400 w-full">
        </div>

        <div class="mt-6">
            <label for="">Password</label>
            <input type="text" class="py-1 rounded border border-gray-400 w-full">
        </div>
        </div>
        
        <div class="flex justify-between mt-6">
        <a href="{{route('password.request')}}">Forgot password?</a>
        
        <button class="rounded hover:text-gray-400 hover:bg-gray-900 bg-gray-700 
        text-white px-3 py-0 pb-1">Log in</button>

        </div>
    </form>
@endsection('content')
