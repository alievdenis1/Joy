@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                
                <form method="GET" action="{{route('searchProduct')}}" enctype="multipart/form-data">
                @csrf
                    <div class="form-group row">
                
                            <label for="city" class="col-md-1 col-form-label text-md-right">{{ __('Город') }}</label>
                            <div class="col-md-2">

                                <select id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city">

                                    @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <label for="gender"  class="col-md-1 col-form-label text-md-right">{{ __('Пол') }}</label>
                            <div class="col-md-2">

                                <select id="gender" type="text"
                                    class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender">

                                    @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endforeach

                                </select>

                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <label for="role"  class="col-md-1 col-form-label text-md-right">{{ __('Кому') }}</label>
                            <div class="col-md-2">

                                <select id="role" type="text"
                                    class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role">

                                    @foreach ($rolesMan as $role)
                                    <option class="rolesMan" value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                    @foreach ($rolesWoman as $role)
                                    <option class="rolesWoman" value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach

                                </select>

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>


                            <label for="age"  class="col-md-1 col-form-label text-md-right">{{ __('Возраст') }}</label>
                            <div class="col-md-2">

                                <select id="age" type="text"
                                    class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="gender">

                                    @for ($x=0; $x<120; $x++)
                                    <option value="{{ $x }}">{{ $x }}</option>
                                    @endfor

                                </select>

                                @error('age')
                                <span class="invalid-feedback" age="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                
                    
                    <div class="row" style="width:100%; margin-top:15px;">

                            <label for="price"  class="col-md-1 col-form-label text-md-right">{{ __('Цена') }}</label>
                            <div class="col-md-2">

                                <select id="price" type="text"
                                    class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="gender">

                                    
                                    <option value= 0>до 500</option>
                                    <option value= 1>500-1000</option>
                                    <option value= 2>1000-5000</option>
                                    <option value= 3>5000-10000</option>
                                    <option value= 4>больше 10000</option>
                                    

                                </select>

                                @error('price')
                                <span class="invalid-feedback" price="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary">
                                    {{ __('Найти') }}
                                </button>
                        
                    </div>
                </div>
                </form>
                <div class="row justify-content-left" >
                <h1 style="margin-top:35px; ">Последние добавленные товары:</h1><br>
                </div>
                <div class="row justify-content-left" >
                @if(!$products->isEmpty())
                    @foreach ($products as $product)
                    <div class="col-md-3">
                        <a href="{{$product->city->slug}}/products/{{$product->slug}}">
                        <div class="card mb-3">
                            <img class="card-img-top" src="{{ asset('/storage/' . $product->imgPath) }}" alt="Card image cap">
                            
                            <div class="card-body">   
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $product->price }} р.</h6> 
                            </div>
                        </div>
                        </a>            
                    </div>
                    @endforeach                
                @else
                    <h2 >Нет товаров</h2>
                @endif

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
