<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-container {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        .login-container img {
            width: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .login-container .form-control {
            margin-bottom: 15px;
        }
        .login-btn {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(40, 167, 69, 0.3);
        }
        .login-btn:hover {
            background-color: #218838;
        }
        .forgot-link, .signup-link {
            font-size: 14px;
        }
        .forgot-link a, .signup-link a {
            color: #28a745;
            text-decoration: none;
        }
        .forgot-link a:hover, .signup-link a:hover {
            text-decoration: underline;
        }
        .remember-me {
            text-align: left;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
        <h2 class="fw-bold">Welcome</h2>
        <img src="https://via.placeholder.com/100" alt="Profile Image">
        <form action="{{ route('authenticate') }}" method="post">
          @csrf
            <input type="text" name='email' class="form-control" placeholder="Username" required>
            <input type="password" name='password' class="form-control" placeholder="Password" required>
            <div class="remember-me mb-3">
                <input type="checkbox" id="remember" name="remember"> <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
        <div class="mt-3 forgot-link">
            <small><a href="#">Forgot Username / Password?</a></small>
        </div>
        <div class="mt-2 signup-link">
            <small>Don’t have an account? <a href="#">Sign up</a></small>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</body>
</html>