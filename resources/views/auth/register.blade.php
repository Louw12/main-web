<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: rgb(194, 194, 194);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }
        
        .register-container {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
        }
        
        .register-sidebar {
            background-color: rgb(0, 63, 105);
            color: white;
            padding: 40px 30px;
            width: 40%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        
        .register-sidebar h2 {
            margin-bottom: 20px;
            font-weight: 600;
        }
        
        .register-sidebar p {
            margin-bottom: 30px;
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.6;
        }
        
        .register-sidebar .logo {
            font-size: 60px;
            margin-bottom: 30px;
        }
        
        .register-form {
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
        
        .form-select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            background-color: #fff;
        }
        
        .form-select:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }
        
        .form-actions {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
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
        
        .login-link {
            color: #3498db;
            text-decoration: none;
            font-size: 14px;
        }
        
        .login-link:hover {
            text-decoration: underline;
        }
        
        .form-footer {
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
            color: #777;
        }
        
        @media (max-width: 768px) {
            .register-container {
                flex-direction: column;
            }
            
            .register-sidebar,
            .register-form {
                width: 100%;
            }
            
            .register-sidebar {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-sidebar">
            <div class="logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z"/>
                    <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z"/>
                </svg>
            </div>
            <h2>MAN 2 KOTA KEDIRI</h2>
            <p>Buat akun untuk mengakses sistem akademik dan mengelola semua sumber daya pendidikan Anda dalam satu platform.</p>
        </div>
        
        <div class="register-form">
            <div class="form-header">
                <h1>Register</h1>
                <p>Lengkapi data diri Anda untuk mendaftar</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="email">Alamat Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email">
                    
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="role">Status</label>
                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <option value="siswa" {{ old('role') == 'siswa' ? 'selected' : '' }}>Siswa</option>
                        <option value="guru" {{ old('role') == 'guru' ? 'selected' : '' }}>Guru</option>
                        <option value="bk" {{ old('role') == 'bk' ? 'selected' : '' }}>Bk</option>
                    </select>
                    
                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="new-password">
                    
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="password-confirm">Konfirmasi Password</label>
                    <input id="password-confirm" type="password" class="form-control" 
                           name="password_confirmation" required autocomplete="new-password">
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn">
                        Daftar Sekarang
                    </button>
                    
                    <a class="login-link" href="{{ route('login') }}">
                        Sudah punya akun? Login
                    </a>
                </div>
                
                <div class="form-footer">
                    <p>Dengan mendaftar, Anda menyetujui syarat dan ketentuan yang berlaku</p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>