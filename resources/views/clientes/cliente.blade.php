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
                <div class="panel-heading">Cliente</div>
                <div class="panel-body">
                    @if(isset($cliente))
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('clientes/atualizar', ['id' => $cliente->id]) }}">

                            <div class="form-group{{ $errors->has('id') ? ' has-error' : '' }}">
                                <label for="id" class="col-md-4 control-label">Código</label>

                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control" name="id" value="{{ $cliente->id }}" disabled>

                                    @if ($errors->has('id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                    @else
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('clientes/criar') }}">
                    @endif
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nome</label>

                            <div class="col-md-6">
                                <input id="nome" type="text" class="form-control" name="nome" value=@if(isset($cliente)) {{ $cliente->nome  }} @else '' @endif required autofocus>

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tag') ? ' has-error' : '' }}">
                            <label for="tag" class="col-md-4 control-label">TAG</label>

                            <div class="col-md-6">
                                <input id="tag" type="tag" class="form-control" name="tag" value=@if(isset($cliente)) {{ $cliente->tag  }} @else '' @endif required>

                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('situacao') ? ' has-error' : '' }}">
                            <label for="situacao" class="col-md-4 control-label">Situação</label>

                            <div class="col-md-6">
                                <select id="situacao" name="situacao" class="form-control" required>
                                    <option class="form-control" id="true" value="true" @if(isset($cliente)) {{ $cliente->situacao == true ? 'selected' : "" }} @endif>Ativo</option>
                                    <option class="form-control" id="false" value="false" @if(isset($cliente)) {{ $cliente->situacao == false ? 'selected' : "" }} @endif>Inativo</option>
                                </select>

                                @if ($errors->has('situacao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('situacao') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Salvar
                                </button>
                                <a href="{{ route('clientes') }}" class="btn btn-primary">Lista</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection