<?php 

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountryConfigController extends Controller
{
    public function __invoke($cc)
    {
        session(['country'=>$cc]);   
        return redirect()->back();
    }

}