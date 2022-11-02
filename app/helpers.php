<?php
    use Illuminate\Support\Facades\Http;

    function get_key($arr, $key)
    {
        foreach($arr as $item){
            if($item->key == $key){
                return $item->value;
            }
        }
    }

    function image_o($model, $img_sz){
        return asset('storage/files/'.unserialize($model->images)[0][$img_sz]);
    }

    function country(){
        try {
            $cc = Http::get('https://api.myip.com')['cc'];
        } catch (\Illuminate\Http\Client\ConnectionException $e){}

        if(empty($cc))
            $cc = session()->has('country')? session('country') : '';
        $countries = json_decode(file_get_contents(base_path('countries.json')));

        $index = array_search($cc, array_column($countries, 'iso2'));
        return $countries[$index];
    }

    function currency($amount){
        $to = $request->session()->has('country') ? json_decode($request->session()->get('country'))->currency : 'NG';

        $amt = Http::get("https://api.exchangerate.host/convert?from=NGN&to=$to&amount=$amount");

        return $amt->result;

    }