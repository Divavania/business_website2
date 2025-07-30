<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Tigatra Adikara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #1e293b; 
        font-family: 'Roboto', sans-serif;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
      }

      .login-box {
        width: 100%;
        max-width: 400px;
        background: #fff; 
        text-align: center;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
        border-radius: 10px;
        padding: 40px 30px;
      }

      .login-key {
        height: 100px;
        font-size: 80px;
        line-height: 100px;
        background: -webkit-linear-gradient(#4797ec, #014a79); 
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
      }

      .login-title {
        margin-top: 15px;
        text-align: center;
        font-size: 24px; 
        letter-spacing: 2px;
        font-weight: bold;
        color: #014a79; 
      }

      .login-form {
        margin-top: 25px;
        text-align: left;
      }

      input[type="email"], input[type="password"] {
        background-color: #fff;
        border: none;
        border-bottom: 2px solid #4797ec; 
        border-radius: 0;
        font-weight: bold;
        outline: 0;
        margin-bottom: 20px;
        padding-left: 0;
        color: #014a79; 
        transition: all 0.3s ease-in-out;
      }

      input[type="email"]:focus, input[type="password"]:focus {
        border-color: #014a79; 
        box-shadow: none;
        background-color: #fff;
        color: #014a79;
      }

      .btn-outline-primary {
        border-color: #4797ec; 
        color: #4797ec; 
        border-radius: 0;
        font-weight: bold;
        letter-spacing: 1px;
        width: 100%;
        padding: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        transition: background-color 0.3s, color 0.3s;
      }

      .btn-outline-primary:hover {
        background-color: #4797ec; 
        color: #fff; 
        border-color: #4797ec;
      }

      .login-text {
        text-align: left;
        color: #6c757d; 
      }
    </style>
  </head>
  <body>
    <div class="login-box">
      <div class="col-lg-12 login-key">
        <i class="fa fa-key" aria-hidden="true"></i>
      </div>
      <div class="col-lg-12 login-title">
        LOGIN ADMINISTRATOR
      </div>

      <div class="col-lg-12 login-form">
        <form action="/login" method="POST">
          @csrf
          <!-- Email input -->
          <div class="form-group">
            <label class="form-control-label">USERNAME</label>
            <input type="email" name="email" class="form-control" required autofocus>
          </div>

          <!-- Password input -->
          <div class="form-group">
            <label class="form-control-label">PASSWORD</label>
            <input type="password" name="password" class="form-control" required>
          </div>

          <!-- Error Message -->
          @if(session('error'))
            <div class="alert alert-danger">
              {{ session('error') }}
            </div>
          @endif

          <div class="col-lg-12 loginbttm">
            <div class="col-lg-12 login-btm login-button">
              <button type="submit" class="btn btn-outline-primary">LOGIN</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>
