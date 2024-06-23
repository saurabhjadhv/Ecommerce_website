<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <section class="container">
      <header>Registration Form</header>
      <form action="{{ route('registration') }}" method="POST" class="form">
        @csrf
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="name" id="name" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" id="email" placeholder="Enter email address" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Password</label>
            <input type="password" name="password" id="password" placeholder="Enter phone number" required />
          </div>
        </div>

        <div class="column">
            <div class="input-box">
              <label>Confirm Password</label>
              <input type="password" name="confirm_password" id="confirm_password" placeholder="Enter phone number" required />
            </div>
          </div>
        <button>Submit</button>
      </form>
    </section>
  </body>
</html>