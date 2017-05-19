@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Vagas ( Disponíveis / Total ) e Clientes utilizando o estacionamento</div>

                <div class="panel-body">
                    <center>
                        @foreach($vagas as $i)
                            <h1>{{ $i->disponiveis }} / {{ $i->total }}</h1>
                        @endforeach
                    </center>
                    <hr>
                    @if(isset($rotatividade))
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Cliente</th>
                                    <th>Data/Hora de entrada</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($rotatividade as $i)
                                <tr>
                                    <td>{{$i['nome']}}</td>
                                    <td>{{$i['entrada']->format('d/m/Y H:i:s')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
