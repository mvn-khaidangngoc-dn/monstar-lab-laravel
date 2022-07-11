<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
        crossorigin="anonymous">
        <title>Update Post</title>
    </head>
    <body class="antialiased">
        <div class=".container-md" style="margin: 50px 10% ;">
            <h3>Chỉnh sửa Post - ID : {{ $post->id }}</h3>
        </div>
        <div class=".container-md" style="margin: 50px 10% ;">
            <form action="{{ url('/posts/update/'.  $post->id )  }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" id="id-post" name="id-post" value="{{ $user->id }}">
                <div class="mb-3">
                    <label for="user_id" class="form-label">User_ID</label>
                    <input type="text" class="form-control" id="user_id" name="user_id" aria-describedby="emailHelp" value="{{$post->userId}}">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Title</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" {{$post->title}}>
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input type="text" class="form-control" name="body" id="text" {{$post->body}}>
                </div>
                <button type="submit" class="btn btn-primary">Cập nhật Post</button>
            </form>
        </div>
        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"></script>
        -->
    </body>
</html>
