@extends('layouts.website')
@section('title-page', 'Relatar avistamento')
@section('subtitle-page', '')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Avistamentos pelo mundo</h1>
        <h2>Últimos avistamentos</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Localização</th>
                            <th>Data</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{ $report->name }}</td>
                            <td>{{ Str::limit($report->description,20,'Ver mais') }}</td>
                            <td><a href="https://maps.google.com/?q={{ $report->latitude }},{{ $report->longitude }}">Mapa</a></td>
                            <td>{{ $report->sighting }}</td>
                            <td>
                                <a href="{{ route('reports.index', $report->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('reports.index', $report->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('reports.index', $report->id) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Apagar</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>                      
@endsection