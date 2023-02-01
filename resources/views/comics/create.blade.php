@extends('layout.app');

@section('content')

    <div>
        <h1 class="text-center text-primary">New Comics</h1>
    </div>

    {{-- Se ci sono degli errori di validazione mostriamo un allert con questi errori --}}
    @if($errors->any())
    <div class="alert alert-danger">
        I dati inseriti non sono validi:
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>

    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-6">

            <form action="{{route('comics.store')}}" method="POST">
                @csrf
    
                <label class="form-label">Title: </label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    
                <label class="form-label">Description: </label>
                <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                
                <label class="form-label">Thumb: </label>
                <input type="text" name="thumb" class="form-control" value="{{ old('thumb') }}">
                
                <label class="form-label">Price: </label>
                <input type="text" name="price" class="form-control" value="{{ old('price') }}">
                
                <label class="form-label">Series: </label>
                <input type="text" name="series" class="form-control" value="{{ old('series') }}">
                
                <label class="form-label">Sale Date: </label>
                <input type="text" name="sale_date" class="form-control" value="{{ old('sale_date') }}">
                
                <label class="form-label">Type: </label>
                <input type="text" name="type" class="form-control" value="{{ old('type') }}">
    
                


                <div class="buttons-containr d-flex justify-content-center">
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary me-3">Add</button>
                    </div>

                    <div class="mt-4">
                       <a href="{{route("comics.index")}}"><button class="btn btn-danger">Back</button></a>
                   </div>

                </div>
    
                
    
    
                
    
    
    
    
    
    
            
    
    
            
            </form>
        </div>

    </div>
    
    
@endsection

