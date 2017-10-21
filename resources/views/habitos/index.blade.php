@extends('app')

@section('content')
    <div class="container">
        <h1>Hábitos</h1>
        
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Nome</th>
                <th>descrição</th>
                <th>Tipo</th>
                <th>ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($habitos as $hab)
                <tr>
                    <td>{{ $hab->nome }}</td>
                    <td>{{ $hab->descricao }}</td>
                    @if ($hab->tp_habito == 'B')
                        <td>Bom</td>
                    @elseif ($hab->tp_habito == 'R')
                        <td>Ruim</td>
                    @endif
                    <td>
                        <a href="{{ route('habitos.edit', ['id'=>$hab->id]) }}"
                                    class="btn-sm btn-success">Editar</a>
                        <a href="{{ route('habitos.destroy', ['id'=>$hab->id]) }}"
                        class="btn-sm btn-danger">Remover</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection