<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Mapper;
use Cache;

class TestController extends Controller
{
    public function hello($id){
        return view('test.hello' , ['title' => 'test', 'subtitle' => 'subtest']);
    }

    public function index()
    {
        echo "test";
        // Redis::set('name', 'Taylor');
        // condole.log($values = Redis::lrange('names', 5, 10));
        // Cache::put('key','knack',1);
        // $value = Cache::get('key');
        // dump($value);
        return view('t');
    }
}

