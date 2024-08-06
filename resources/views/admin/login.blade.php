<!DOCTYPE html>
<!---Coding By CoderGirl | www.codinglabweb.com--->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form | CoderGirl</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      @if (session('message'))
      <div class="alert">
       {{ session('message') }}
       </div> 
   @endif
   @if (session('error'))
   <div class="alert">
    {{ session('error') }}
    </div> 
@endif	
      <form action="{{route('postLogin')}}" method="POST">
        @csrf
        <input type="text" placeholder="Enter your user name" name="username">
        <input type="password" placeholder="Enter your password" name="password">
        <a href="#">Forgot password?</a>
        <button type="submit"class="button">login</button>
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <a href="{{route('register')}}">Signup</a>
        </span>
      </div>
    </div>

  </div>
</body>
</html>
