<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Mapper;
use Cache;

class TestController extends Controller
{
    public function hello($ids){
        return view('test.hello' , ['title' => $ids, 'subtitle' => 'subtest']);
    }

    

    public function getTweets($cityName){
        
        $ch = curl_init('https://api.twitter.com/1.1/search/tweets.json?q=dc&count=4'); 
        curl_setopt($ch,CURLOPT_HTTPHEADER,array(
            'Authorization: Bearer AAAAAAAAAAAAAAAAAAAAACiJ2wAAAAAAaixVPIc9iNSMwEXD8B7odbhjTZU%3DHyba6etQh0SpxlOzHAarWta1jKcDBwrpD8vD67ieiJYYXLYdjM'
    )); 
        $output = curl_exec($ch); 
        curl_close($ch);
        return $output;
        // dump($ch);        
        // curl_setopt($ch, CURLOPT_URL, );
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    }

    public function index()
    {


        // Redis::set('name', 'Taylor');
        // condole.log($values = Redis::lrange('names', 5, 10));
        // Cache::put('key',$output,1);
        $value = Cache::get('key');
        dump($value);
        return view('map');
    }
}

