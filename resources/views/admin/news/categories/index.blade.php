@extends('layouts.admin')
@section('content')
@endsection
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Список категорий</h1> &nbsp; <strong><a href="{{ route('admin.categories.create') }}">Добавить категорию</a></strong>

</div>

<!-- Content Row -->
<div class="row">
    <table class="table table-bordered">
    <thead>
        <tr>
            <th>
                id
            </th>
            <th>
                header
            </th>
            <th>
                slug
            </th>
            <th>
                date
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td>{{ $category->id}}</td>
            <td>{{ $category->title}}</td>
            <td>{{ $category->slug}}</td>
            <td>{{ $category->created_at}}</td>
        </tr>
        @empty
        <tr>
        <td colspan="4">
        <h2>Записей нет</h2>
        </td>
        </tr>
       
        @endforelse
    </tbody>
    </table>

</div>



</div>