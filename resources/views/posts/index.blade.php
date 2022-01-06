<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center">
            <h1>All Posts</h1>
        <a class="btn btn-outline-success" href="{{route('posts.create')}}">Add New Post</a>
        </div>
       @if (session('msg'))
       <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
       {{session('msg')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    
       </div>  
       @endif
       
        <table class="mt-4 table table-bordered table-hover table-striped">
       
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->content}}</td>
                
                <td>
                    <a download="" href="{{ asset('uploads/'.$post->image)}}">
                    <img width="100" src="{{ asset('uploads/'.$post->image)}}" alt="">
                    </a>
                </td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->format('Y, M d h:m:s')}}</td>
                <td>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary btn-sm">Edit</a>

                    <form class="d-inline" action="{{route('posts.destroy',$post->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('worning ? delete Post')" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>   
            @endforeach
            
        </table>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>