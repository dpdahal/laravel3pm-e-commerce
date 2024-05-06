<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">

</head>
<body>
<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h1>Login Page</h1>
          @include('components.messages')
      </div>
      <div class="col-md-12 mt-5">
          <form action="{{ route('login') }}" method="post">
              @csrf
              <div class="form-group mb-3">
                  <label for="email">Email:
                      <span class="text-danger">{{$errors->first('email')}}</span>
                  </label>
                  <input type="email" name="email" id="email" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <label for="password">Password:
                      <span class="text-danger">{{$errors->first('password')}}</span>
                  </label>
                  <input type="password" name="password" id="password" class="form-control">
              </div>
              <div class="form-group mb-3">
                  <button class="btn btn-success">Login</button>
              </div>

          </form>
      </div>
  </div>
</div>
</body>
</html>
