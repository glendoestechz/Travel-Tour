<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Portal Login</title>
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
        }

        .login-container {
            background: rgba(30, 30, 30, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(100, 100, 100, 0.2);
            border-radius: 24px;
            padding: 40px;
            max-width: 420px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .form-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .form-title {
            font-size: 32px;
            font-weight: 700;
            color: #e0e0e0;
            margin-bottom: 8px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-subtitle {
            color: #a0a0a0;
            font-size: 16px;
            font-weight: 400;
        }

        .input-group {
            margin-bottom: 24px;
            position: relative;
        }

        .input-group label {
            display: block;
            color: #c0c0c0;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group input,
        .input-group select {
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

        .input-group input::placeholder {
            color: #888;
        }

        .input-group input:focus,
        .input-group select:focus {
            outline: none;
            border-color: #707070;
            background: rgba(50, 50, 50, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .input-group select {
            cursor: pointer;
        }

        .input-group select option {
            background: #2a2a2a;
            color: #e0e0e0;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #a0a0a0;
            cursor: pointer;
        }

        .remember-me input {
            margin-right: 8px;
            width: auto;
            height: 16px;
            accent-color: #707070;
        }

        .forgot-password {
            color: #b1c695;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
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
        }

        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            background: linear-gradient(135deg, #666, #888);
        }

        .login-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-weight: 500;
            text-align: center;
            display: none;
        }

        .alert-success {
            background: rgba(60, 90, 60, 0.6);
            border: 1px solid rgba(100, 150, 100, 0.4);
            color: #90c695;
        }

        .alert-error {
            background: rgba(90, 60, 60, 0.6);
            border: 1px solid rgba(150, 100, 100, 0.4);
            color: #c69590;
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 30px 20px;
                margin: 10px;
                border-radius: 20px;
            }
            
            .form-title {
                font-size: 28px;
            }
            
            .form-subtitle {
                font-size: 14px;
            }
            
            .remember-forgot {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="form-header">
            <h1 class="form-title">Welcome Back</h1>
            <p class="form-subtitle">Access your travel portal</p>
        </div>

        <div id="alertSuccess" class="alert alert-success"></div>
        <div id="alertError" class="alert alert-error"></div>

        <form id="loginForm">
            <div class="input-group">
                <label for="username">Username or Email</label>
                <input type="text" id="username" placeholder="Enter your username or email" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Enter your password" required>
            </div>

            <div class="input-group">
                <label for="role">Select Role</label>
                <select id="role" required>
                    <option value="">Choose your role...</option>
                    <option value="staff">Travel Staff</option>
                    <option value="admin">Travel Administrator</option>
                </select>
            </div>

            <div class="remember-forgot">
                <label class="remember-me">
                    <input type="checkbox" id="remember">
                    Remember me
                </label>
                <a href="#" class="forgot-password" onclick="forgotPassword()">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn" id="loginBtn">
                Login
            </button>
        </form>
    </div>

    <script>
        const form = document.getElementById('loginForm');
        const successAlert = document.getElementById('alertSuccess');
        const errorAlert = document.getElementById('alertError');
        const loginBtn = document.getElementById('loginBtn');

        // Demo credentials for travel portal
        const credentials = {
            staff: {
                username: 'travelstaff',
                email: 'staff@travelportal.com',
                password: 'travel123'
            },
            admin: {
                username: 'traveladmin',
                email: 'admin@travelportal.com',
                password: 'admin123'
            }
        };

        function forgotPassword() {
            const role = document.getElementById('role').value;
            if (!role) {
                alert('Please select your role first, then we can assist with password recovery.');
                return;
            }
            alert(`Password reset for ${role} role would be processed here. Please contact your travel portal administrator.`);
        }

        function showMessage(type, message) {
            successAlert.style.display = 'none';
            errorAlert.style.display = 'none';
            
            if (type === 'success') {
                successAlert.textContent = message;
                successAlert.style.display = 'block';
                successAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            } else {
                errorAlert.textContent = message;
                errorAlert.style.display = 'block';
                errorAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        // Real-time validation feedback
        const inputs = form.querySelectorAll('input, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.hasAttribute('required') && this.value.trim()) {
                    this.style.borderColor = 'rgba(100, 150, 100, 0.8)';
                    this.style.background = 'rgba(60, 90, 60, 0.3)';
                } else if (this.hasAttribute('required') && !this.value.trim()) {
                    this.style.borderColor = 'rgba(100, 100, 100, 0.3)';
                    this.style.background = 'rgba(40, 40, 40, 0.8)';
                }
            });

            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                if (!this.matches(':focus')) {
                    this.style.transform = 'translateY(0)';
                }
            });
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const role = document.getElementById('role').value;
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            // Basic validation
            if (!role) {
                showMessage('error', '⚠️ Please select your role.');
                document.getElementById('role').focus();
                return;
            }
            
            if (!username || !password) {
                showMessage('error', '⚠️ Please fill in all fields.');
                return;
            }
            
            // Email validation if username contains @
            if (username.includes('@')) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(username)) {
                    showMessage('error', '⚠️ Please enter a valid email address.');
                    return;
                }
            }
            
            // Simulate login process
            loginBtn.disabled = true;
            loginBtn.textContent = 'Verifying...';
            
            // Reset input styles
            inputs.forEach(input => {
                input.style.borderColor = 'rgba(100, 100, 100, 0.3)';
                input.style.background = 'rgba(40, 40, 40, 0.8)';
            });
            
            // Simulate API call delay
            setTimeout(() => {
                const selectedCredentials = credentials[role];
                
                // Check credentials for the selected role
                if (selectedCredentials && 
                    (username === selectedCredentials.username || username === selectedCredentials.email) && 
                    password === selectedCredentials.password) {
                    
                    const roleName = role === 'admin' ? 'Administrator' : 'Staff Member';
                    const dashboardName = role === 'admin' ? 'Admin Dashboard' : 'Staff Dashboard';
                    
                    showMessage('success', `🎉 Welcome ${roleName}! Accessing ${dashboardName}...`);
                    
                    // Reset form on success
                    form.reset();
                    
                    // Simulate redirect after success
                    setTimeout(() => {
                        alert(`Redirecting to Travel Portal ${dashboardName}...`);
                    }, 2000);
                } else {
                    showMessage('error', '⚠️ Invalid credentials for the selected role. Please check your details and try again.');
                    
                    // Highlight invalid fields
                    document.getElementById('username').style.borderColor = 'rgba(150, 100, 100, 0.8)';
                    document.getElementById('username').style.background = 'rgba(90, 60, 60, 0.3)';
                    document.getElementById('password').style.borderColor = 'rgba(150, 100, 100, 0.8)';
                    document.getElementById('password').style.background = 'rgba(90, 60, 60, 0.3)';
                    document.getElementById('role').style.borderColor = 'rgba(150, 100, 100, 0.8)';
                    document.getElementById('role').style.background = 'rgba(90, 60, 60, 0.3)';
                }
                
                loginBtn.disabled = false;
                loginBtn.textContent = 'Access Portal';
            }, 1200);
        });

        // Show demo credentials info
        console.log('Travel Portal Demo Credentials:');
        console.log('Staff - Username: travelstaff or staff@travelportal.com, Password: travel123');
        console.log('Admin - Username: traveladmin or admin@travelportal.com, Password: admin123');
    </script>
</body>
</html>