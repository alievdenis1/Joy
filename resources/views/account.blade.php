@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-left">

        <div class="col-md-12">           
                <h1>Мои товары</h1>
                <a class="navbar-brand" href="{{route('addProduct')}}">
                    <button class="btn btn-primary" style="margin-bottom: 25px">
                        {{ __('Добавить товар') }}
                    </button> 
                </a><br>
        </div>

        @foreach ($products as $product)
        <div class="col-md-3">
            <a href="{{$product->city->slug}}/products/{{$product->slug}}">
                <div class="card mb-3">
                    <img class="card-img-top" src="{{ asset('/storage/' . $product->imgPath) }}" alt="Card image cap">
                
                    <div class="card-body">   
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }} р.</h6>                        
                             
                        <a href="{{$product->city->slug}}/products/{{$product->slug}}/edit" class="card-link">Изменить</a>

                                                
                        <form style="display:inline" action="{{$product->city->slug}}/products/{{$product->slug}}" method="post">
                            @method('DELETE')
                            @csrf                            
                            <input class="card-link delete-button" type="submit" value="Удалить">                                                
                        </form>
                    </div>
                </div>
            </a>            
        </div>
        @endforeach 

    </div>
</div>

@endsection
