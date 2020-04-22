<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Product;
use App\User;
use App\City;
use App\Gender;
use App\Parameter;
use App\Valueparameter;

use Auth;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function viewSerchProducts(Request $request)
    { 
        $cities = City::all();  
        $genders = Gender::all();
        $rolesWoman = Parameter::find(2)->valueparameters()->get();   
        $rolesMan = Parameter::find(1)->valueparameters()->get(); 
        $roles = Parameter::find(3)->valueparameters()->get();
        
        
       $products = Valueparameter::find($request['role'])->products()->where('city_id', $request['city'])->whereIn('gender_id', array($request['gender'], 3))->where('minage', '<=' , (int)$request['age'])->where('maxage', '>=' , (int)$request['age']);

       if((int)$request['price']==0){
        $products = $products->where('price', '<=' ,500);
       }else if((int)$request['price']==1){
        $products = $products->where('price', '>=' ,500)->where('price', '<=' ,1000);
       }else if((int)$request['price']==2){
        $products = $products->where('price', '>=' ,1000)->where('price', '<=' ,5000);
        }else if((int)$request['price']==3){
            $products = $products->where('price', '>=' ,5000)->where('price', '<=' ,10000);
        }else if((int)$request['price']==4){
            $products = $products->where('price', '>=' ,10000);
        };

        $products =  $products->get();

        return view('searchproducts', compact('products', 'cities', 'genders', 'rolesWoman', 'rolesMan', 'roles'));
    }

    public function viewProduct($city, $productName)
    {   
        $product = Product::whereSlug($productName)->firstOrFail();        
        
                
        return view('product',  compact('product'));        
    }

    public function deleteProduct($city, $productName)
    {   
        $product = Product::whereSlug($productName)->firstOrFail();      
        if(Auth::check() &&  Auth::user()->id == Product::where('slug', $productName)->firstOrFail()->user_id){
            $product->delete();
        }
        else{
            return redirect()->route('account');  
        };
                
        return redirect()->route('account');         
    }


    public function editProduct($cityName, $productName)
    {          
        
        $cities = City::all();  
        $genders = Gender::all();
        $rolesWoman = Parameter::find(2)->valueparameters()->get();   
        $rolesMan = Parameter::find(1)->valueparameters()->get(); 
        $roles = Parameter::find(3)->valueparameters()->get();  
        
        $productSelect = Product::whereSlug($productName)->firstOrFail();   
        

        return view('editproduct', compact('cities', 'genders', 'rolesWoman', 'rolesMan', 'roles', 'productSelect' ));        
    }

    

    public function myProducts()
    {         
        $products = Auth::user()->products()->get();     
        $cities = City::all();    
        return  view('account', compact('products', 'cities'));        
    }

    public function addProduct()
    {   
        $cities = City::all();  
        $genders = Gender::all();
        $rolesWoman = Parameter::find(2)->valueparameters()->get();   
        $rolesMan = Parameter::find(1)->valueparameters()->get(); 
        $roles = Parameter::find(3)->valueparameters()->get();          
        return view('addproduct', compact('cities', 'genders', 'rolesWoman', 'rolesMan', 'roles' ));        
    }

    public function postAddProduct(Request $request)
    {  
        //загрузка изображения
        $imgPath = $request->image->store('upload', 'public');

        //получаем id всех ролей
        $rolesId = array();
        if( $request['gender'] == 1 ) {
            foreach (Parameter::find(1)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    
            
        };
        if( $request['gender'] == 2 ) {
            foreach (Parameter::find(2)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    
        };

        if( $request['gender'] == 3 ) {
            foreach (Parameter::find(1)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(2)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };  
        };
           
        
        //Проходимся по всем ролям и если роль выбрана пользователем добавляем в массив для связывания с товаром
        $valueparameters = array();
        foreach ($rolesId as $x){
            if( $request['role' . $x] ) array_push($valueparameters, Valueparameter::find($x));
        };    

        
        
        Validator::make($request->all(), [
            "image" => ['required', 'image']
        ])->validate();

        //Создаём товар и связываем с выбранными ролями
        $product = Product::create([
            'imgPath' => $imgPath,
            'name' => $request['name'],
            'description' => $request['description'],
            'number' => 1,
            'price' => $request['price'],
            'user_id' => Auth::user()->id,
            'city_id' => $request['city'],
            'gender_id' => $request['gender'],
            'minage' => $request['age'],
            'maxage' => $request['age2']
        ])->valueparameters()->saveMany($valueparameters);   
        
        return redirect()->route('account');       
    }


    public function putEditProduct(request $request, $city, $productName)
    {  

        if(Auth::check() && Auth::user()->id == Product::where('slug', $productName)->firstOrFail()->user_id){
        //загрузка изображения
        if( $request->image != null){
            $imgPath = $request->image->store('upload', 'public');
        } 
        else{
            $imgPath = Product::where('slug', $productName)->firstOrFail()->imgPath;
        }

        //получаем id всех ролей
        $rolesId = array();
        if( $request['gender'] == 1 ) {
            foreach (Parameter::find(1)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    
            
        };
        if( $request['gender'] == 2 ) {
            foreach (Parameter::find(2)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    
        };

        if( $request['gender'] == 3 ) {
            foreach (Parameter::find(1)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };

            foreach (Parameter::find(2)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };    

            foreach (Parameter::find(3)->valueparameters()->select('id')->get() as $value){
                array_push($rolesId,  $value->id);
            };  
        };
                
        
        //Проходимся по всем ролям и если роль выбрана пользователем добавляем в массив для связывания с товаром
        $valueparameters = array();
        foreach ($rolesId as $x){
            if( $request['role' . $x] ) array_push($valueparameters, Valueparameter::find($x));
        };    
        
        Validator::make($request->all(), [
            "image" => ['image']
        ])->validate();


        //Создаём товар и связываем с выбранными ролями
        $product = Product::where('slug', $productName)->update([
            'imgPath' => $imgPath,
            'name' => $request['name'],
            'description' => $request['description'],
            'number' => 1,
            'price' => $request['price'],
            'user_id' => Auth::user()->id,
            'city_id' => $request['city'],
            'gender_id' => $request['gender'],
            'minage' => $request['age'],
            'maxage' => $request['age2']
        ]);   

        Product::where('slug', $productName)->firstOrFail()->valueparameters()->detach(); 
        Product::where('slug', $productName)->firstOrFail()->valueparameters()->saveMany($valueparameters); 

        return redirect()->route('account');       

        }
        else{
            return redirect()->route('account');  
        };
      
    }
    


    
}
