<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Page</title>
<style> 
Body {
  font-family: Calibri, Helvetica, sans-serif;
  background-color: pink;
  height: 100vh;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}
button { 
       background-color: #4CAF50; 
       width: 100%;
       color: orange; 
       padding: 15px; 
       margin: 10px 0px; 
       border: none; 
       cursor: pointer; 
} 
form { 
        border: 3px solid #f1f1f1; 
        width: 50%;
        max-width: 500px; /* Ensure it looks good on smaller screens */
        background-color: lightblue;
} 
input[type=email], input[type=password] { 
        width: 100%; 
        margin: 8px 0;
        padding: 12px 20px; 
        display: inline-block; 
        border: 2px solid green; 
        box-sizing: border-box; 
}
button:hover { 
        opacity: 0.7; 
} 
.cancelbtn { 
        width: auto; 
        padding: 10px 18px;
        margin: 10px 5px;
} 
.container { 
        padding: 25px; 
} 
</style> 
</head>  
<body>  
    <form action="{{ url('userlogin') }}" method="post">
        @csrf
        <div class="container"> 
            <center><h1>Student Login Form</h1></center>
            @if (session('error'))
                <div>{{ session('error') }}</div>
            @endif
            <label>Email : </label> 
            <input type="email" placeholder="Enter Email" name="email" required>
            <label>Password : </label> 
            <input type="password" placeholder="Enter Password" name="password" required>
            <button type="submit">Login</button> 
            <input type="checkbox" checked="checked"> Remember me 
            <button type="button" class="cancelbtn">Cancel</button> 
            Forgot <a href="#">password?</a> 
        </div> 
    </form>   
</body>   
</html>
