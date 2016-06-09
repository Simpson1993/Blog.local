@extends('main')

@section('title', '| All Posts')

@section('content')

   <div class="row">
       <div class="col-md-10">
           <h1>All Posts</h1>
       </div>
       <div class="col-md-2">
           <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Post</a>
       </div>
       <div class="col-md-12">
           <hr>
       </div>
   </div>

   <div class="col-md-12">
       <table class="table">
           <thead>
               <th>#</th>
               <th>Title</th>
               <th>Body</th>
               <th>Category</th>
               <th>Author</th>
               <th>Created At</th>
               <th></th>
           </thead>

           <tbody>

               @foreach ($posts as $post)

                   <tr>
                       <th>{{ $post->id }}</th>
                       <td>{{ $post->title }}</td>
                       <td>{{ substr($post->body, 0, 50) }}{{ strlen($post->body)>50 ? "..." : ""}}</td>
                       <td>{{ $post->category->name }}</td>
                       <td>{{ $post->user->name }}</td>
                       <td>{{ date('M j, Y H:i', strtotime($post->created_at)) }}</td>
                       <td>
                           @if($post->user_id == Auth::user()->id || Auth::user()->id == 1)
                               <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">View</a>
                           @else
                               <a href="#" class="btn btn-default btn-sm">View</a>
                           @endif

                           @if($post->user_id == Auth::user()->id  || Auth::user()->id == 1)
                               <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                           @else
                               <a href="#" class="btn btn-default btn-sm">Edit</a>
                           @endif

                       </td>
                   </tr>

               @endforeach

           </tbody>
       </table>

       <div class="text-center">
           {!! $posts->links() !!}
       </div>
   </div>
@stop