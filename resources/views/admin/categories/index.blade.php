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

<h2>Categorias <a href="{{ route('categories.create') }}" class="btn btn-primary"><span data-feather="plus-circle"></span> Adicionar Categoria</a></h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th>#</th>
            <th>Categoria</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <form method="post" action="{{ route('categories.destroy', $category) }}" onsubmit="return confirm('Tem certeza que deseja remover *{{ addslashes( $category->name )}}* ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><span data-feather="trash-2"></span> Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
