<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\RunTestsInSeparateProcesses;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index',["myName"=>"Thwe Thwe Htun","myAge"=>20]);
})->name("page.home");

Route::get("about-us",fn()=>view('about')->with("a","aaa"))->name("page.about");
// Route::get("contact-us",fn()=>view('contact'));
Route::view("contact-us","contact",["phone"=>"0911223344"])->name("page.contact");
// Route::get("/about-us",fn()=>view('about'));


Route::get('greeting',fn()=>"Min Ga Lar Par");
Route::get('say-my-name/{name?}',function($name = "Thwe Thwe"){
    // $firstName = "Thwe ";
    // $lastName = "Thwe";
    // return $firstName.$lastName;
    return "My name is " .$name;
});
Route::get("fruits",fn()=>['apple','orange','mango']);


// Route::get('/area/{width}/{height}',function($width,$height){
//     return "Area is ". $width * $height . " sqft";
// });

Route::get('area/{width}/{height}',fn($width,$height)=> "Area is ". $width * $height . " sqft");

Route::get('products',function(){
    $products = file_get_contents('https://fakestoreapi.com/products');
   
    dd( json_decode($products));
});

Route::get('products/price-max/{amount}',function($amount){
    // $products = file_get_contents('https://fakestoreapi.com/products');
    // $productsArray = json_decode($products);
    // $filterProducts = array_filter($productsArray,fn($product)=>$product->price<$amount);
    // dd($filterProducts);
    // return $filterProducts;
    return dd(Http::get('https://fakestoreapi.com/products')
    ->collect()
    ->where("price","<",$amount));

    // $res = Http::get('https://fakestoreapi.com/products');
    // dd($res->collect()->where("price","<",$amount));
});
Route::get('products/price-min/{amount}',function($amount){
    $products = file_get_contents('https://fakestoreapi.com/products');
    // $productsArray = json_decode($products);
    // $filterProducts = array_filter($productsArray,fn($product)=>$product->price>$amount);
    // dd($filterProducts);
    // return $filterProducts;
    return dd(Http::get('https://fakestoreapi.com/products')
    ->collect()
    ->where("price",">",$amount));
});
Route::get('products/price-between/{min}/and/{max}',function($min,$max){
    $products = file_get_contents('https://fakestoreapi.com/products');
    $productsArray = json_decode($products);
    $filterProducts = array_filter($productsArray,fn($product)=>$product->price>$min && $product->price < $max);
    dd($filterProducts);
    return $filterProducts;


    return dd(Http::get('https://fakestoreapi.com/products')
    ->collect()
    ->whereBetween("price",[$min,$max]));
});
