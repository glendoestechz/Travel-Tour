<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 50%, #404040 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            pointer-events: none;
        }

        .login-container {
            background: rgba(30, 30, 30, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(100, 100, 100, 0.2);
            border-radius: 24px;
            padding: 40px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(from 0deg, transparent, rgba(100, 100, 100, 0.1), transparent);
            animation: rotate 20s linear infinite;
            pointer-events: none;
        }

        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .form-content {
            position: relative;
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1 {
            font-size: 32px;
            font-weight: 700;
            color: #e0e0e0;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label {
            display: block;
            color: #c0c0c0;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input {
            width: 100%;
            padding: 16px 20px;
            background: rgba(40, 40, 40, 0.8);
            border: 2px solid rgba(100, 100, 100, 0.3);
            border-radius: 16px;
            color: #e0e0e0;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
        }

        .form-group input::placeholder {
            color: #888;
        }

        .form-group input:focus {
            outline: none;
            border-color: #707070;
            background: rgba(50, 50, 50, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .form-options label {
            display: flex;
            align-items: center;
            color: #c0c0c0;
            gap: 8px;
        }

        .form-options input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .forgot-password {
            color: #b1c695;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #90c695;
            text-decoration: underline;
        }

        .login-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #555, #777);
            border: none;
            border-radius: 16px;
            color: #e0e0e0;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            background: linear-gradient(135deg, #666, #888);
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .login-btn:active {
            transform: translateY(-1px);
        }

        .signup-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #a0a0a0;
        }

        .signup-link a {
            color: #b1c695;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .signup-link a:hover {
            color: #90c695;
            text-decoration: underline;
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            background: rgba(100, 100, 100, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        .shape:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .shape:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 60%;
            right: 10%;
            animation-delay: 2s;
        }

        .shape:nth-child(3) {
            width: 60px;
            height: 60px;
            bottom: 20%;
            left: 20%;
            animation-delay: 4s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 30px 20px;
                margin: 10px;
                border-radius: 20px;
            }
            
            .login-header h1 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-container">
        <div class="form-content">
            <div class="login-header">
                <h1>Welcome Back</h1>
            </div>

            <form id="loginForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>

                <div class="form-options">
                    <label>
                        <input type="checkbox" id="rememberMe">
                        Remember me
                    </label>
                    <a href="#" class="forgot-password" id="forgotPasswordLink">Forgot password?</a>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <div class="signup-link">
                Don't have an account? <a href="#">Sign up</a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Please contact support to reset your password or check your email for reset instructions.');
        });

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if (username && password) {
                alert('Login successful!');
            } else {
                alert('Please fill in all fields.');
            }
        });
    </script>
</body>
</html>