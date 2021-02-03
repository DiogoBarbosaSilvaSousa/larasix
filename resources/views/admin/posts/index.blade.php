@extends('layouts.admin')

@section('content')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listagem</h1>
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


<h2>Posts <a href="{{ route('posts.create') }}" class="btn btn-primary"><span data-feather="plus-circle"></span> Adicionar Post</a></h2>

<div class="container-fluid">
    <form class="row" method="get" action="{{ route('posts.index') }}">
        <div class="col-9 col-sm-9">
            <input class="form-control" type="text" name="titulo" placeholder="Pesquisar por título" >
        </div>

        <div class="col-3 col-sm-3">
            <button type="submit" class="btn btn-primary mb-2">
                <span data-feather="search"></span>
            </button>
        </div>

    </form>
</div>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Miniatura</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>
                       @foreach($post->categories as $category)
                            {{ $category->name }}
                       @endforeach
                    </td>
                    <td>
                        <img src="{{ asset($post->thumbnail) }}" class="img-fluid" style="max-width: 100px;">
                    </td>
                    <td>
                        <form method="post" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Tem certeza que deseja remover *{{ addslashes( $post->title )}}* ?')">
                            @csrf
                            @method('DELETE')
                           <button type="submit" class="btn btn-danger"><span data-feather="trash-2"></span> Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->appends(['titulo'=>request('titulo','')])->links() }} Total de posts: {{ $posts->total() }}
</div>
@endsection
