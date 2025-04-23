<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color:rgb(194, 194, 194);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }
        
        .login-sidebar {
            background-color:rgb(0, 63, 105);
            color: white;
            padding: 40px 30px;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        
        .login-sidebar h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .login-sidebar p {
            margin-bottom: 30px;
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .login-sidebar .logo {
            font-size: 60px;
            margin-bottom: 30px;
        }
        
        .login-form {
            width: 60%;
            padding: 40px;
        }
        
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .form-header h1 {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }
        
        .form-header p {
            color: #777;
            font-size: 14px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #444;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .form-control.is-invalid {
            border-color: #e74c3c;
        }
        
        .invalid-feedback {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .form-check input {
            margin-right: 8px;
        }
        
        .form-check label {
            font-size: 14px;
            color: #555;
        }
        
        .form-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }
        
        .btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .btn:hover {
            background-color: #2980b9;
        }
        
        .forgot-password {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
        }
        
        .forgot-password:hover {
            text-decoration: underline;
        }
        
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }
            
            .login-sidebar,
            .login-form {
                width: 100%;
            }
            
            .login-sidebar {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-sidebar">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
            </div>
            <h2>MAN 2 KOTA KEDIRI</h2>
            <p>Log in to access your academic dashboard and manage all your educational resources in one place.</p>
        </div>
        
        <div class="login-form">
            <div class="form-header">
                <h1>Login</h1>
                <p>Enter your credentials to continue</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="current-password">
                    
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" 
                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Remember Me
                    </label>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn">
                        Login
                    </button>
                    
                    @if (Route::has('password.request'))
                    <a class="forgot-password" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>