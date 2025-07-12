<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin | Tigatra Adikara</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f0f0; }
        .login-box {
            margin-top: 100px;
            max-width: 400px;
            padding: 30px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center">
    <div class="login-box">
        <h4 class="text-center text-primary mb-4">Login Admin</h4>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
</body>
</html>
