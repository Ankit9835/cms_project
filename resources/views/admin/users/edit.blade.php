@extends('layouts.app')

@section('content')

<h1> Edit Users </h1>

<div class = "col-sm-3">
    <img src = "{{  $user->photo ? $user->photo->file : 'https://via.placeholder.com/150

C/O https://placeholder.com/' }}" alt = "" class = "img-responsive img-rounded">
</div>

<div class = "col-sm-9">

{!! Form::model($user, ['method'=>'PATCH', 'action'=> ['AdminUserController@update', $user->id],'files'=>true]) !!}
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
            <option value = "{{ $role->id }}" <?php if($role->id == $user->role_id) echo 'selected'; ?>> {{ $role->name }}  </option>
        @endforeach
           
        </select>
         </div>

         <div class="form-group">
                {!! Form::label('is_active', 'Status:') !!}
                {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), null , ['class'=>'form-control'])!!}
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

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminUserController@destroy',$user->id], 'files' => true]) !!}
    @csrf

        <button type = "submit" class = "btn btn-danger btn-block">  Delete User </button>

    {!! Form::close() !!}



    </div>

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