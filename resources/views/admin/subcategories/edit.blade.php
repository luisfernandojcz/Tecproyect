@extends('layouts.admin')
@section('title','Editar categorías')
@section('breadcrumb')
<li>
    <a href="{{('categories.index')}}">/ Subcategorías </a>
</li>
<li class="breadcrumb-item active">@yield('title')</li>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edición de Subcategoría</h3>
    </div>
    {!! Form::model($category, ['route'=>['subcategories.update', $category->id],'method'=>'PUT','files'=>true]) !!}
    <div class="card-body">
        @include('admin.subcategories.form.form')
    </div>
    <div class="card-fooder">
        <a class="btn btn-danger float-right" href="{{route('subcategories.index')}}">Cancelar</a>
         
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div> 
    {!! Form::close() !!} 
    
</div>
@endsection