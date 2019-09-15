

@extends('layouts.admin')
        
@section('dtTableCSS')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section('content')
    <h1>Posts</h1>
    <br>
    <a href="/posts/create" class="btn btn-primary">Create Post</a>
    <br>
    <br>
     <table id="postTable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                
                @if(count($posts)>0)
                    @foreach ($posts as $post)
                    <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->body}}</td>
                    <td>{{$post->created_at}}</td>
                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a></td>
                    <td>{!!Form::open(['action' =>['PostController@destroy',$post->id],'method' => 'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}} 
                        {{Form::submit('Delete',['class' =>'btn btn-danger deleteRecord'])}}
                        {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
               
        </tbody>
            <tfoot>
                <tr>
                    <th>Title</th>
                    <th>Body</th>
                    <th>Created At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
        @else
        <p>No posts found</p>
        @endif
        @endsection

 @section('dtTable')    
    <script>
        $(document).ready(function() {
        $('#postTable').DataTable();
        } );

        $(document).on('click','.deleteRecord',function(){
        var id = $(this).data("id");
        //var token = $("meta[name='csrf-token']").attr("content");
        if(confirm("Are you sure you want to delete this data?"))
        {
            $.ajax(
        {
            url: "posts/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                //"_token": token, 
            },
            success: function (){
                $('#postTable').DataTable().ajax.reload();
        }
        })
        }
        else
        {
            return false;
        }
   
   
   
});
    </script>
@endsection