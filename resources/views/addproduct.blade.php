@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Добавление товара</div>

                <div class="card-body">

                    <form method="POST" action="addproduct" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">

                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Изображение товара') }}</label>
                            <div class="col-md-6">
                                <input id="image" class="form-control @error('image') is-invalid @enderror"  name="image" type="file" required>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div><br><br>

                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Как называется?') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br><br>

                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Что это?') }}</label>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <textarea id="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    value="{{ old('description') }}" required autocomplete="description"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <label for="price"  class="col-md-4 col-form-label text-md-right">{{ __('Сколько стоит? (Руб.)') }}</label>
                            <div class="col-md-6">

                                <input style="max-width:100px" id="price" type="number"
                                    class="form-control @error('name') is-invalid @enderror" name="price"
                                    value="{{ old('price') }}" required autocomplete="price">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br><br>

                            <label for="age"  class="col-md-4 col-form-label text-md-right">{{ __('Для людей какого возраста?') }}</label>
                            <div class="col-md-6">

                                <input style="max-width:100px; display: inline !important;" id="age" type="number"
                                    class="form-control @error('name') is-invalid @enderror" name="age" placeholder="1"
                                    value="{{ old('age') }}" required autocomplete="age">

                                <input style="max-width:100px; display: inline !important;" id="age2" type="number"
                                    class="form-control @error('name') is-invalid @enderror" name="age2"
                                    placeholder="130" value="{{ old('age2') }}" required autocomplete="age2">

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @error('age2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br><br>

                            <label for="gender"  class="col-md-4 col-form-label text-md-right">{{ __('Для людей какого пола?') }}</label>
                            <div class="col-md-6">

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

                            </div><br><br>

                            <label for="role"  class="col-md-4 col-form-label text-md-right">{{ __('Кому подойдёт?') }}</label>
                            <div class="col-md-6">

                                <div class="form-check" id="rolesMan">   
                                    @foreach ($rolesMan as $role)
                                    
                                        <input class="form-check-input" type="checkbox" name="role{{ $role->id }}" id="{{$role->id}}" value="{{$role->id}}">
                                        <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label> <br>
                                        
                                    @endforeach
                                </div>

                                <div class="form-check" id="rolesWoman">   
                                        @foreach ($rolesWoman as $role)
                                        
                                            <input class="form-check-input" type="checkbox" name="role{{ $role->id }}" id="{{$role->id}}" value="{{$role->id}}">
                                            <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label> <br>
                                            
                                        @endforeach
                                </div>

                                <div class="form-check" id="roles">   
                                        @foreach ($roles as $role)
                                        
                                            <input class="form-check-input" type="checkbox" name="role{{ $role->id }}" id="{{$role->id}}" value="{{$role->id}}">
                                            <label class="form-check-label" for="{{ $role->id }}">{{ $role->name }}</label> <br>
                                            
                                        @endforeach
                                </div>

                                    

                                

                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div><br><br>


                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Город') }}</label>
                            <div class="col-md-6">

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

                            </div><br><br>


                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Добавить') }}
                                </button>
                            </div>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection