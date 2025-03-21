@extends('layouts.website')
@section('title-page', 'Relatar avistamento')
@section('subtitle-page', '')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <h1>Informar avistamento</h1>
        <div class="box box-primary">
            <form action="/ufo-reporting" role="form" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Seu nome:</label><br>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['form']->name() ?>" placeholder="Informe seu nome">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label><br>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['form']->email() ?>" placeholder="Informe seu e-mail">
                    </div>
                    <div class="form-group">
                        <label for="sighting">Data e hora do avistamento</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="datetime-local" class="form-control" id="sighting" name="sighting" value="<?php echo date('Y-m-d\TH:00')?>" data-inputmask="'alias': 'dd/mm/yyyy H:i'" data-mask="">
                        </div><!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label for="description">Detalhes sobre o avistamento</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Descreva o avistamento com detalhes como visibilidade do céu; formato, cor e altura do objeto; movimentos que ele realizou; tempo total do avistamento etc"><?php echo $data['form']->paragraphs(2,true) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude:</label><br>
                        <input type="text" class="form-control" id="latitude" name="latitude" value="-23.60892317268478" placeholder="-23.60892317268478">
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude:</label><br>
                        <input type="text" class="form-control" id="longitude" name="longitude" value="-46.60272460793167" placeholder="-46.60272460793167">
                    </div>
                    <input type="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>                      
@endsection