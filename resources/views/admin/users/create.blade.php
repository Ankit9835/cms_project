@extends('layouts.app')

@section('content')

<h1> Create Page </h1>

{!! Form::open(['method' => 'POST', 'action' => 'AdminUserController@store', 'files' => true]) !!}
    @csrf

        <div class = "form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

         <div class = "form-group">
        <label> Role </label>
        <select name = "role_id" class = "form-control">
       
        @foreach($roles as $role)
            <option value = "{{ $role->id }}"> {{ $role->name }}  </option>
        @endforeach
           
        </select>
         </div>

        <div class = "form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'),0,  ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
        {!! Form::label('photo_id', 'Image:') !!}
        {!! Form::file('photo_id', null,  ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>

        <div class = "form-group">
        {!! Form::submit('Create Post', ['class' => 'form-control btn btn-info']) !!}
        </div>

    {!! Form::close() !!}

    @if(count($errors) > 0)
        
            <div class = "alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li> {{ $error }} </li>
            </ul>
            @endforeach
            </div>
        
    @endif

@endsection