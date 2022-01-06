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
            <h1>Edit Post : <span class="text-danger">{{$post->title}}</span></h1>
        <a class="btn btn-outline-dark" href="{{route('posts.index')}}">Return Back</a>
        </div>   
@if ($errors->any()>0)
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif  
</div>

    <form class="container my-5" action="{{route('posts.update',$post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
            <input type="text" name="title" placeholder="Title" class="form-control" value="{{$post->title}}" />
       @error('title')
          <small class="text-danger">{{$message}}</small> 
       @enderror
        </div>

        <div class="mb-3">
            <textarea rows="5" name="content" placeholder="Content" class="form-control" >{{$post->content}}</textarea>
            @error('content')
            <small class="text-danger">{{$message}}</small> 
         @enderror
        </div>

        <div class="mb-3">
            <input type="file" name="image"  class="form-control" />
            @error('image')
            <small class="text-danger">{{$message}}</small> 
         @enderror
         <img width="150" src="{{asset('uploads/'.$post->image)}}" alt="">
        </div>
        <button class="ntn btn-info">Update</button>
    </form>

</div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>