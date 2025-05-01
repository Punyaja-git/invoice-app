<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .register-card {
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

<div class="register-card">
    <h3 class="text-center mb-4">Register</h3>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Enter your name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" required>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

</body>
</html>
