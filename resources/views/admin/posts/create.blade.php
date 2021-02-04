@extends('layouts.admin')

@section('content')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>

@if(!empty($message))
    <div class="alert alert-success">
        {{ $message }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<h2>Novo Post</h2>

<div class="container-fluid">
    <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <label for="inputTitle">Título do post</label>
                    <input type="text" class="form-control" name="title" id="inputTitle" placeholder="Digite o título do Post">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <label for="inputContent">Conteúdo do post</label>
                    <textarea class="form-control" name="content" id="inputContent" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <label for="inputCategories">Categorias</label>
                    <select class="form-control" name="category" id="inputCategories">
                        <option value="">Selecione uma categoria</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <label for="inputFile">Escolha uma figura para destaque</label>
                    <input type="file" class="form-control-file" name="imagem" id="inputFile">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </div>
        </div>


    </form>
</div>

@endsection
