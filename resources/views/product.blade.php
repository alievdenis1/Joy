@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">
        <div class="col-md-12">           
                <h1>{{$product->name}}</h1>                
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">  
            <img class="card-img-top" src="{{ asset('/storage/' . $product->imgPath) }}" alt="Card image cap">       
        </div>
        <div class="col-md-6">  
            <h2>{{ substr($product->price,0,-3)}} ₽</h2>
            <h4>Телефон: {{ $product->user->phone}}</h4>
            <h5>Город: {{ $product->city->name}}</h5>
            <p>{{$product->description}}</p>
        </div>
    </div>
</div>

@endsection
