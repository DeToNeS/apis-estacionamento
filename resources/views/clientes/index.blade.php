@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">Busca</div>
                <div class="panel-body">
                    <form action="{{ route('clientes/busca') }}" method="get" role="search">
                        {{ csrf_field() }}
                        <div class="input-group">
                            <input type="text" class="form-control" name="busca" placeholder="Clientes">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>

                    @if(isset($clientes))
                        <h2>Clientes <a href="{{ route('clientes/cliente') }}" class="btn btn-primary">Novo</a></h2>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Ações</th>
                                    <th>Código</th>
                                    <th>Nome</th>
                                    <th>TAG</th>
                                    <th>Situação</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($clientes as $i)
                                    <tr>
                                        <td>
                                            <a href="{{ route('clientes/cliente/editar', ['id' => $i->id]) }}" class="actions edit">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="{{ route('clientes/cliente/excluir', ['id' => $i->id]) }}" class="actions delete" title="Excluir">
                                                <span class="glyphicon glyphicon-remove"></span>
                                            </a>
                                        </td>
                                        <td>{{$i['id']}}</td>
                                        <td>{{$i['nome']}}</td>
                                        <td>{{$i['tag']}}</td>
                                        <td>@if($i['situacao'] == 1) Ativo @else Inativo @endif</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $clientes->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
