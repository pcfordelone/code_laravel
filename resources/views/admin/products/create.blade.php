@extends('layout')

@section('content')
    <h1>Criar Novo Produto</h1>

    @if ($errors->any())
        <ul class="alert">
            @foreach($errors->all() as $error)
                <li class="alert-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    {!! Form::open() !!}

    <!-- Nome Form Input -->
    <div class="form-group">
        {!! Form::label('name', 'Nome:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <!-- Price Form Input -->
    <div class="form-group">
        {!! Form::label('price', 'Valor:') !!}
        {!! Form::text('price', null, ['class'=>'form-control']) !!}
    </div>

    <!-- Featured and Recomend Form Input -->
    <div class="form-group">
        <div class="col-sm-2">
            {!! Form::label('featured', 'Destaque:') !!}
            {!! Form::checkbox('featured', '1', false) !!}
        </div>
        <div class="col-sm-2">
            {!! Form::label('recommend', 'Recomendado:') !!}
            {!! Form::checkbox('recommend', '1', false) !!}
        </div>
        <div class="clearfix"></div>
    </div>

    <!-- Description Form Input -->
    <div class="form-group">
        {!! Form::label('description', 'Descrição:') !!}
        {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Adicionar Produto', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection