@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Скачать новость</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.index') }}">Список новостей</a>
                
            </strong>
        </div>

        <!-- Content Row -->
        <div>
        @if($errors -> any())
            @foreach($errors->all() as $error)
              <div class = "alert alert-danger">
                 {{ $error }}
              </div> 
            @endforeach    
        @endif
            <form action="{{ route('admin.news.store') }}" method = "POST">
            @csrf
            <div class="col-8">
             <div class="form-group">
                 <label for="newsLink">Ссылка на новость</label>
                 <input type = "text" class="form-control" name="newsLink" id = "newsLink" value ="{{ old('newsLink') }}">  
            </div>
             <div class="form-group">
                 <label for="email">Ваш email</label>
                 <textarea class="form-control" id = "email" name="email">{!!  old('email') !!}</textarea>
             </div>
             
             <br>
             <button type="submit" class="btn btn-success">Отправить</button>
             </div>
         </form>
        </div>
    </div>
@endsection 

