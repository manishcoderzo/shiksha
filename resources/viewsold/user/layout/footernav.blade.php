<style type="text/css">
.navbar {
  overflow: hidden;
  background-color: #fff;
  position: fixed !important;
  bottom: 0 !important;
  width: 100%;
  padding: 0 !important;
  box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
}

.navbar a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 4px 0;
  text-decoration: none;
  font-size: 17px;
  width: 33%;
  text-decoration: none !important;
}

.navbar a:hover {
  background: #f1f1f1;
  color: black;
}

.navbar a:focus {
  border-top: 2px solid black;
  color: black;
  transition: 0.5s;
}
</style>
<div class="navbar">
  <a href="{{route('user.home')}}" class="active"><i class="fa-solid fa-house" style="font-size: 18px;"></i><br>Home</a>
  <a href="{{route('user.attendance')}}"><i class="fa-solid fa-calendar-day text-dark" style="font-size: 18px;"></i><br>Attendance</a>
  <a href="{{route('user.account')}}"><i class="fa-regular fa-circle-user" style="font-size: 18px;"></i><br>Account</a>
</div>