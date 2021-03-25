@extends('layouts.admin')
@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1> &nbsp; <strong>
                <a href="{{ route('admin.categories.index') }}">Список категорий</a>
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
            <form action="{{ route('admin.categories.store',['name' => 'Example']) }}" method = "POST">
            @csrf
            <div class="col-8">
             <div class="form-group">
                 <label for="title">Наименование категории</label>
                 <input type="text" class="form-control" placeholder="Заголовок" name="title" value="{{ old('title') }}">
                 @error('title')
                   <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
            </div>
             <div class="form-group">
                 <label for="title">Описание категории</label>
                 <textarea class="form-control" name="description" id="description">{!!  old('description') !!}</textarea>
             </div>
             <br>
             <button type="submit" class="btn btn-success">Сохранить</button>
             </div>
         </form>
        </div>


    </div>
@endsection 
@push('js')
    <script type="text/javascript">
        ClassicEditor
        .create(document.querySelector( '#description' )
        ,{
            options: {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        },
            /*toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
        
            heading: {
                options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]   
        }*/
    } )
        .catch(error => {
            console.error( error );
        } );
    </script>
@endpush

