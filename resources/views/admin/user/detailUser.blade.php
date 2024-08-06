<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
  <div>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat');

* {
	box-sizing: border-box;
}

body {
	background-color: #28223F;
	font-family: Montserrat, sans-serif;
	
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;

	min-height: 100vh;
	margin: 0;
}

h3 {
	margin: 10px 0;
}

h6 {
	margin: 5px 0;
	text-transform: uppercase;
}

p {
	font-size: 14px;
	line-height: 21px;
}

.card-container {
	background-color: #231E39;
	border-radius: 5px;
	box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
	color: #B3B8CD;
	padding-top: 30px;
	position: relative;
	width: 350px;
	max-width: 100%;
	text-align: center;
}

.card-container .pro {
	color: #231E39;
	background-color: #FEBB0B;
	border-radius: 3px;
	font-size: 14px;
	font-weight: bold;
	padding: 3px 7px;
	position: absolute;
	top: 30px;
	left: 30px;
}

.card-container .round {
	border: 1px solid #03BFCB;
	border-radius: 50%;
	padding: 7px;
}

button.primary {
	background-color: #03BFCB;
	border: 1px solid #03BFCB;
	border-radius: 3px;
	color: #231E39;
	font-family: Montserrat, sans-serif;
	font-weight: 500;
	padding: 10px 25px;
}

button.primary.ghost {
	background-color: transparent;
	color: #02899C;
}

.skills {
	background-color: #1F1A36;
	text-align: left;
	padding: 15px;
	margin-top: 30px;
}

.skills ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.skills ul li {
	border: 1px solid #2D2747;
	border-radius: 2px;
	display: inline-block;
	font-size: 12px;
	margin: 0 7px 7px 0;
	padding: 7px;
}
.changepass{
	text-decoration: none;
	color: #fff
}

.logout1{
  text-decoration: none;
  color: #fff
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;


}
</style>
</div>
</head>
<body>
  <div class="card-container">
    <span class="pro">User</span>
    <img class="round" width="80" src="{{asset('/storage/'.$user->avatar) }}" alt="user" />
    <h3>{{$user->fullname}}</h3>
  
    <p>{{$user->email}}</p>
    <div class="buttons">
      <button class="primary">
       <a class="logout1" href="{{route('edituser',$user)}}"> Edit</a>
      </button>
      <button class="primary ghost">
        <a class="logout1" href="{{route('Logout')}}" >Logout</a>
      </button>
    </div>
    <div class="skills">
      <h6>Status</h6>
      <ul>
        
        <li style="color: greenyellow">Active</li>
		<li><a class="changepass" href="{{route('Url-Pass')}}">Change pass</a></li>
      </ul>
    </div>
  </div>
  
  <footer>
    <p>
      Created with <i class="fa fa-heart"></i> by
      <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
      - Read how I created this
      <a target="_blank" href="https://florin-pop.com/blog/2019/04/profile-card-design">here</a>
      - Design made by
      <a target="_blank" href="https://dribbble.com/shots/6276930-Profile-Card-UI-Design">Ildiesign</a>
    </p>
  </footer>
    
</body>
</html>
<!-- partial -->
  
</body>
</html>
