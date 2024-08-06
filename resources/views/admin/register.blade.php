<!DOCTYPE html>
<!-- Designined by CodingLab - youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Registration Form | CodingLab </title>
    <link rel="stylesheet" href="register.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="{{route('postRegister')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" required name="fullname">
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" placeholder="Enter your username" required name="username">
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" required name="email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" required name="sdt">
          </div>
          <div class="input-box">
            <span class="details">Avatar</span>
            <input type="file" placeholder="Enter your password" required name="avatar">
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" placeholder="Enter your password" required name="adress">
          </div>
          <div class="input-box">
            <span class="details">birth day</span>
            <input type="date" placeholder="Enter your password" required name="birthday">
          </div>
          <div class="input-box">
            <span class="details">Password</Address></span>
            <input type="password" placeholder="Confirm your password" required name="password">
          </div>
        </div>
       
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
