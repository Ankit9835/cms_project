@extends('layouts.app')

@section('content')

<h1> All Posts </h1>

<table class="table">
       <thead>
         <tr>
             <th>User Name</th>
             <th> Category </th>
             <th>Photo</th>
             <th>Title</th>
             <th>Body</th>
            
             <th>Created</th>
             <th>Updated</th>
          </tr>
        </thead>
        <tbody>

        @if($posts)


            @foreach($posts as $post)


           <tr>
              <td>{{$post->user->name}}</td>
              
              <td>{{$post->category ? $post->category->name : 'No Category'}}</td>
              <td>  <img src = "{{ $post->photo ? $post->photo->file : 'https://via.placeholder.com/150

C/O https://placeholder.com/' }}" width = "70px" height = "70px">   </td>
              <td> {{ $post->title }} </td>
              <td> {{ $post->body }} </td>
              <td>{{$post->created_at->diffForHumans()}}</td>
              <td>{{$post->updated_at->diffForHumans()}}</td>
           </tr>

            @endforeach


          @endif


       </tbody>
     </table>


@endsection