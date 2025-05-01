<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .login-card {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            background-color: #ffffff;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #0d6efd;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h3 class="text-center mb-4">Login</h3>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" required autocomplete="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" required autocomplete="current-password">
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</body>
</html>
