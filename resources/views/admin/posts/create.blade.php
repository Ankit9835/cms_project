@extends('layouts.app')






@section('content')


    <h1>Create Post</h1>

    <div class="row">
         {!! Form::open(['method'=>'POST', 'action'=> 'AdminPostController@store', 'files'=>true]) !!}

           <div class="form-group">
                 {!! Form::label('title', 'Title:') !!}
                 {!! Form::text('title', null, ['class'=>'form-control'])!!}
           </div>

            <div class="form-group">
                <label> Category </label>
                <select class = "form-control" name = "category_id">
                @foreach($category as $row)
                    <option value = "{{$row->id}}">  {{ $row->name }} </option>
                @endforeach
                </select> 
            </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null,['class'=>'form-control'])!!}
             </div>


            <div class="form-group">
                {!! Form::label('body', 'Description:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
            </div>




             <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
             </div>

           {!! Form::close() !!}

    </div>


    <div class="row">


        @include('includes.form_error')



    </div>




@stop