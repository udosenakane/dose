@extends('layouts.app')



@section('content')
    <form method="POST" style="max-width:500px" class="mx-auto borde p-5 px-2 border-gray-400" action="{{ route('login') }}">
        @csrf
        <h1 class="text-center rounded-tr rounded-tl py-2 bg-gray-600 
        text-white mt-10  border-b-0 border-gray-400">Forgot password</h1>
        
        <div class="border p-5 px-2 rounded-br rounded-bl border-gray-400">

            
            <div class="flex flex-col">
                <label for="">Email address</label>
                <input type="text" autofocus class="py-1 rounded border border-gray-400 w-full">
            </div>
    
        </div>
        
        <div class="flex justify-end mt-4">
        
        <button class="rounded hover:text-gray-400 hover:bg-gray-900 bg-gray-700 
        text-white px-3 py-0 pb-1">Send password reset link</button>

        </div>
    </form>
@endsection('content')

