<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gehu Store</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap2.min.css') }}">
    {{-- <link href="{{ asset('css/bootstrap2.min.css') }}" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
  </head>
  <body background="/gambar/background.png" style="background-size: cover">
    <div class="container" >
       
        <div class="row">
            <div class="col">
                <div class="card p-3 mx-auto" style="margin-top:20%; width: 20rem">
                    <div class="card-body">
                        <h2 class="font-weight-bold text-center">Sign In</h2>
                        
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-light btn-md w-100" style="background-color: #2528DC;color:#fff">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    </div>
    
    <script src="{!! asset('/js/bootstrap3.bundle.min.js') !!}" ></script>
    <script src="{!! asset('/js/sweetalert2.min.js') !!}"></script>
    <script>
        @if (session('status'))
            swal({
                title: "Failded",
                text: "{{ session('status') }}",
                icon: "error",
                button: "Close!",
            });
        @endif
        
    </script>
</body>
</html>