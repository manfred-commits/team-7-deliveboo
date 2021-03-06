@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Crea un Piatto') }}
                    <a href="{{route('admin.plates.index')}}" class="d-flex justify-content-center align-items-end">
                        <button class="btn-primary btn">Torna al Menu</button>                            
                    </a>
                </div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.plates.store') }}"  enctype="multipart/form-data">
                        @csrf

                        {{-- name input --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="name" class="col-lg-3 col-form-label text-lg-right">{{ __('Nome') }}</label>

                            <div class="col-lg-9">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>               

                        

                        {{-- description textarea tag --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="description" class="col-lg-3 col-form-label text-lg-right">{{ __('Descrizione') }}</label>

                            <div class="col-lg-9">
                                <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- ingredients textarea tag --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="ingredients" class="col-lg-3 col-form-label text-lg-right">{{ __('Ingredienti') }}</label>

                            <div class="col-lg-9">
                                <textarea id="ingredients"  class="form-control @error('ingredients') is-invalid @enderror" name="ingredients" required autocomplete="ingredients" autofocus>{{ old('ingredients') }}</textarea>

                                @error('ingredients')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- price input --}}
                        <div class="form-group col-12 row col-lg-11 input_container">
                            <label for="price" class="col-lg-3 col-form-label text-lg-right">{{ __('Prezzo') }}</label>

                            <div class="col-lg-9">

                                <input id="price" type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus/>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        {{-- image input tag --}}
                        <div class="form-group col-12 row col-lg-11 input_container my-4">
                            <div class="col-lg-9 offset-lg-3">
                                {{-- label per l'input tag --}}
                                <label name="image">Inserisci l'immagine del piatto da creare</label>
                            
                                {{-- input tag, type file, per inviare file all'invio del form --}}
                                <input type="file" name="image"
                                    class="form-control-file @error('image') is-invalid @enderror" >
                            
                                {{-- codice per mostrare un errore in caso di validazione non soddisfatta --}}
                                @error('image')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror    
                            </div>
                        </div>                        
                            
                            {{-- category select tag --}}
                            <div class="form-group">
                                <label class="col-12" for="plate_type_id">Categoria</label>

                                <div class="col-12">
                                    <select id="plate_type_select" name="plate_type_id" class="form-control @error('plate_type_id') is-invalid @enderror">
                                        <option value="">-- Selezion una categoria --</option>
                                        
                                        @foreach ($plateCategories as $category)
                                        <option value="{{$category["id"]}}">{{$category["name"]??old('name')}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('plate_type_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror                                    
                                </div>

                            </div>
                        </div>


                        <div class="form-group d-flex justify-content-center">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crea piatto') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/crud_plate_type.js') }}" defer></script>
@endsection