@extends('layouts.website')
@section('title-page', 'Avistamentos')
@section('subtitle-page', '')
@section('content')
<link rel="stylesheet" href="/css/leafletmaps/leaflet.css" />
<script src="/js/leafletmaps/leaflet.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<h1>UAP Reporting</h1>
<p>
	O projeto <b>UAP Reporting</b> é uma iniciativa para coletar e analisar avistamentos de fenômenos anômalos não identificados (UAP - Unidentified Anomalous Phenomenon) em todo o território nacional. Temos como premissa, criar um banco de dados abrangente que possa ser usado para pesquisa e análise de ufólogos e sociedade em geral, ajudando a entender melhor esses fenômenos.
</p>

<p class="">Selecione um ponto para ver detalhes do avistamento ou clique no mapa para informar um relato.</p>
<div id="map">

</div>

<div class="modal fade" id="report" tabindex="-1" role="dialog" aria-labelledby="reportLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="reportLabel">Informar avistamento</h5>
				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">X</button>
			</div>
			<div class="modal-body">
				<h1>Informar avistamento</h1>
				<div class="box box-primary">
					<x-report-form />
				</div>
			</div>

		</div>
	</div>
</div>
@endsection