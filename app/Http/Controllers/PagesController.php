<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\City;
use App\Gender;
use App\Parameter;
use App\Valueparameter;

use Illuminate\Http\Request;

class PagesController extends Controller
{     

    public function index()
    {        
        $cities = City::all();  
        $genders = Gender::all();
        $rolesWoman = Parameter::find(2)->valueparameters()->get();   
        $rolesMan = Parameter::find(1)->valueparameters()->get(); 
        $roles = Parameter::find(3)->valueparameters()->get();      
        $products = Product::orderBy('id', 'desc')->take(12)->get();

        return view('home', compact('cities', 'genders', 'rolesWoman', 'rolesMan', 'roles', 'products' ));
    }

    
}
