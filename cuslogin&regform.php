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

        .login-container, .registration-container {
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
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .registration-container {
            max-width: 480px;
        }

        .login-container::before, .registration-container::before {
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

        .login-header, .form-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .login-header h1, .form-title {
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

        .form-group, .input-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-group label, .input-group label {
            display: block;
            color: #c0c0c0;
            font-weight: 500;
            margin-bottom: 8px;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input, .input-group input,
        .input-group select, .input-group textarea {
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

        .form-group input::placeholder, .input-group input::placeholder,
        .input-group textarea::placeholder {
            color: #888;
        }

        .form-group input:focus, .input-group input:focus,
        .input-group select:focus, .input-group textarea:focus {
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

        .input-group textarea {
            min-height: 100px;
            resize: vertical;
        }

        .required-mark {
            color: #999;
            font-weight: bold;
        }

        .password-requirements {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
            line-height: 1.4;
        }

        .password-strength {
            height: 4px;
            background: rgba(100, 100, 100, 0.2);
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .strength-weak { background: #c69590; width: 25%; }
        .strength-fair { background: #c6b195; width: 50%; }
        .strength-good { background: #b1c695; width: 75%; }
        .strength-strong { background: #90c695; width: 100%; }

        .password-match-indicator {
            font-size: 12px;
            margin-top: 4px;
            transition: all 0.3s ease;
        }

        .match-success { color: #90c695; }
        .match-error { color: #c69590; }

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

        .login-btn, .submit-button {
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

        .login-btn::before, .submit-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover, .submit-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
            background: linear-gradient(135deg, #666, #888);
        }

        .login-btn:hover::before, .submit-button:hover::before {
            left: 100%;
        }

        .login-btn:active, .submit-button:active {
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
            cursor: pointer;
        }

        .signup-link a:hover {
            color: #90c695;
            text-decoration: underline;
        }

        .back-to-login {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #a0a0a0;
        }

        .back-to-login a {
            color: #b1c695;
            text-decoration: none;
            transition: color 0.3s ease;
            cursor: pointer;
        }

        .back-to-login a:hover {
            color: #90c695;
            text-decoration: underline;
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

        .hidden {
            display: none;
        }

        .form-transition {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.3s ease;
        }

        .form-transition.active {
            opacity: 1;
            transform: translateX(0);
        }

        @media (max-width: 600px) {
            .login-container, .registration-container {
                padding: 30px 20px;
                margin: 10px;
                border-radius: 20px;
            }
            
            .login-header h1, .form-title {
                font-size: 28px;
            }
            
            .form-subtitle {
                font-size: 14px;
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

    <!-- Login Form -->
    <div class="login-container" id="loginContainer">
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
                Don't have an account? <a href="#" id="showSignupForm">Sign up</a>
            </div>
        </div>
    </div>

    <!-- Registration Form -->
    <div class="registration-container hidden" id="registrationContainer">
        <div class="form-content">
            <div class="form-header">
                <h1 class="form-title">Join Our Adventure</h1>
                <p class="form-subtitle">Register for amazing travel experiences</p>
            </div>

            <div id="alertSuccess" class="alert alert-success">
                🎉 Registration successful! You can now login with your credentials!
            </div>

            <div id="alertError" class="alert alert-error">
                ⚠️ Please fill in all required fields correctly.
            </div>

            <form id="travelRegistrationForm">
                <div class="input-group">
                    <label for="regUsername">Create Username <span class="required-mark">*</span></label>
                    <input type="text" id="regUsername" name="username" placeholder="Create your username" required>
                </div>

                <div class="input-group">
                    <label for="regPassword">Create Password <span class="required-mark">*</span></label>
                    <input type="password" id="regPassword" name="password" placeholder="Create a secure password" required>
                    <div class="password-requirements">
                        Password must be at least 8 characters with uppercase, lowercase, number, and special character
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                    </div>
                </div>

                <div class="input-group">
                    <label for="confirmPassword">Confirm Password <span class="required-mark">*</span></label>
                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                    <div class="password-match-indicator" id="passwordMatchIndicator"></div>
                </div>

                <!-- Add gap between password section and customer details -->
                <div style="height: 32px;"></div>

                <div class="form-subtitle" style="margin-bottom: 16px; font-weight: 600; color: #b1c695;">
                    Customer Details
                </div>

                <div class="input-group">
                    <label for="fullname">Full Name <span class="required-mark">*</span></label>
                    <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
                </div>

                <div class="input-group">
                    <label for="email">Email Address <span class="required-mark">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                </div>

                <div class="input-group">
                    <label for="phone">Phone Number <span class="required-mark">*</span></label>
                    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                </div>

                <div class="input-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" placeholder="Enter your full address"></textarea>
                </div>

                <button type="submit" class="submit-button">Register</button>
            </form>

            <div class="back-to-login">
                Already have an account? <a href="#" id="showLoginForm">Back to Login</a>
            </div>
        </div>
    </div>

    <script>
        // Form switching functionality
        const loginContainer = document.getElementById('loginContainer');
        const registrationContainer = document.getElementById('registrationContainer');
        const showSignupForm = document.getElementById('showSignupForm');
        const showLoginForm = document.getElementById('showLoginForm');

        // Store users data (in a real app, this would be in a database)
        let users = [];

        // Form switching functions
        function switchToRegistration() {
            loginContainer.classList.add('hidden');
            registrationContainer.classList.remove('hidden');
            registrationContainer.classList.add('form-transition');
            setTimeout(() => {
                registrationContainer.classList.add('active');
            }, 10);
        }

        function switchToLogin() {
            registrationContainer.classList.add('hidden');
            registrationContainer.classList.remove('form-transition', 'active');
            loginContainer.classList.remove('hidden');
            loginContainer.classList.add('form-transition');
            setTimeout(() => {
                loginContainer.classList.add('active');
            }, 10);
        }

        // Event listeners for form switching
        showSignupForm.addEventListener('click', function(e) {
            e.preventDefault();
            switchToRegistration();
        });

        showLoginForm.addEventListener('click', function(e) {
            e.preventDefault();
            switchToLogin();
        });

        // Login form functionality
        document.getElementById('forgotPasswordLink').addEventListener('click', function(e) {
            e.preventDefault();
            alert('Please contact support to reset your password or check your email for reset instructions.');
        });

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            
            if (username && password) {
                // Check if user exists in our "database"
                const user = users.find(u => u.username === username);
                if (user) {
                    // Successful login
                    alert('Login successful! Welcome back, ' + user.fullname + '!');
                    // Redirect to homepage (or dashboard)
                    window.location.href = 'homepage.php';
                } else {
                    alert('User not found. Please check your credentials or sign up for a new account.');
                }
            } else {
                alert('Please fill in all fields.');
            }
        });

        // Registration form functionality
        const form = document.getElementById('travelRegistrationForm');
        const successAlert = document.getElementById('alertSuccess');
        const errorAlert = document.getElementById('alertError');
        const passwordInput = document.getElementById('regPassword');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const passwordStrengthBar = document.getElementById('passwordStrengthBar');
        const passwordMatchIndicator = document.getElementById('passwordMatchIndicator');

        // Password strength checker
        function checkPasswordStrength(password) {
            let strength = 0;
            let feedback = [];

            if (password.length >= 8) strength += 1;
            else feedback.push('at least 8 characters');

            if (/[a-z]/.test(password)) strength += 1;
            else feedback.push('lowercase letter');

            if (/[A-Z]/.test(password)) strength += 1;
            else feedback.push('uppercase letter');

            if (/[0-9]/.test(password)) strength += 1;
            else feedback.push('number');

            if (/[^A-Za-z0-9]/.test(password)) strength += 1;
            else feedback.push('special character');

            return { strength, feedback };
        }

        // Update password strength indicator
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            const { strength } = checkPasswordStrength(password);
            
            passwordStrengthBar.className = 'password-strength-bar';
            
            if (password.length === 0) {
                passwordStrengthBar.style.width = '0%';
            } else if (strength <= 2) {
                passwordStrengthBar.classList.add('strength-weak');
            } else if (strength === 3) {
                passwordStrengthBar.classList.add('strength-fair');
            } else if (strength === 4) {
                passwordStrengthBar.classList.add('strength-good');
            } else {
                passwordStrengthBar.classList.add('strength-strong');
            }
        });

        // Check password match
        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;
            
            if (confirmPassword.length === 0) {
                passwordMatchIndicator.textContent = '';
                passwordMatchIndicator.className = 'password-match-indicator';
                return;
            }
            
            if (password === confirmPassword) {
                passwordMatchIndicator.textContent = '✓ Passwords match';
                passwordMatchIndicator.className = 'password-match-indicator match-success';
            } else {
                passwordMatchIndicator.textContent = '✗ Passwords do not match';
                passwordMatchIndicator.className = 'password-match-indicator match-error';
            }
        }

        confirmPasswordInput.addEventListener('input', checkPasswordMatch);
        passwordInput.addEventListener('input', checkPasswordMatch);

        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Hide alerts
            successAlert.style.display = 'none';
            errorAlert.style.display = 'none';
            
            // Collect form data
            const formData = new FormData(form);
            const userData = {};
            
            for (let [key, value] of formData.entries()) {
                userData[key] = value;
            }
            
            // Validate required fields
            const requiredFields = ['username', 'fullname', 'email', 'phone', 'password', 'confirmPassword'];
            let isValid = true;
            
            requiredFields.forEach(field => {
                const input = document.getElementById(field === 'username' ? 'regUsername' : field);
                if (!userData[field] || userData[field].trim() === '') {
                    input.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                    input.style.background = 'rgba(90, 60, 60, 0.3)';
                    isValid = false;
                } else {
                    input.style.borderColor = 'rgba(100, 150, 100, 0.8)';
                    input.style.background = 'rgba(60, 90, 60, 0.3)';
                }
            });
            
            // Check if username already exists
            if (users.find(u => u.username === userData.username)) {
                document.getElementById('regUsername').style.borderColor = 'rgba(150, 100, 100, 0.8)';
                document.getElementById('regUsername').style.background = 'rgba(90, 60, 60, 0.3)';
                alert('Username already exists. Please choose a different username.');
                isValid = false;
            }
            
            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const emailInput = document.getElementById('email');
            if (userData.email && !emailRegex.test(userData.email)) {
                emailInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                emailInput.style.background = 'rgba(90, 60, 60, 0.3)';
                isValid = false;
            }

            // Password validation
            const { strength } = checkPasswordStrength(userData.password);
            if (strength < 5) {
                passwordInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                passwordInput.style.background = 'rgba(90, 60, 60, 0.3)';
                isValid = false;
            }

            // Password match validation
            if (userData.password !== userData.confirmPassword) {
                confirmPasswordInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                confirmPasswordInput.style.background = 'rgba(90, 60, 60, 0.3)';
                isValid = false;
            }
            
            if (isValid) {
                // Remove confirmPassword from stored data
                delete userData.confirmPassword;
                // In a real application, you would hash the password before storing
                userData.hashedPassword = userData.password; // Placeholder for hashed password
                delete userData.password; // Remove plain text password
                
                // Add registration details
                userData.registrationDate = new Date().toISOString();
                userData.userId = 'USR' + Date.now();
                
                // Store user data
                users.push(userData);
                
                // Show success message
                successAlert.style.display = 'block';
                
                // Reset form
                form.reset();
                passwordStrengthBar.style.width = '0%';
                passwordStrengthBar.className = 'password-strength-bar';
                passwordMatchIndicator.textContent = '';
                passwordMatchIndicator.className = 'password-match-indicator';
                
                // Reset input styles
                const inputs = form.querySelectorAll('input, select, textarea');
                inputs.forEach(input => {
                    input.style.borderColor = 'rgba(100, 100, 100, 0.3)';
                    input.style.background = 'rgba(40, 40, 40, 0.8)';
                });
                
                // Log for demo
                console.log('New user registered:', userData);
                console.log('Total users:', users.length);
                
                // Scroll to success message
                successAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
                
                // Auto-switch to login form after 2 seconds
                setTimeout(() => {
                    alert('Registration successful! You will now be redirected to the login form.');
                    switchToLogin();
                }, 2000);
            } else {
                // Show error message
                errorAlert.style.display = 'block';
                errorAlert.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        });

        // Real-time validation feedback for registration form
        const regInputs = form.querySelectorAll('input, select, textarea');
        regInputs.forEach(input => {
            input.addEventListener('input', function() {
                if (this.hasAttribute('required') && this.value.trim()) {
                    this.style.borderColor = 'rgba(100, 150, 100, 0.8)';
                    this.style.background = 'rgba(60, 90, 60, 0.3)';
                } else if (this.hasAttribute('required') && !this.value.trim()) {
                    this.style.borderColor = 'rgba(100, 100, 100, 0.3)';
                    this.style.background = 'rgba(40, 40, 40, 0.8)';
                }
            });

            input.addEventListener('blur', function() {
                if (this.type === 'email' && this.value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (emailRegex.test(this.value)) {
                        this.style.borderColor = 'rgba(100, 150, 100, 0.8)';
                        this.style.background = 'rgba(60, 90, 60, 0.3)';
                    } else {
                        this.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                        this.style.background = 'rgba(90, 60, 60, 0.3)';
                    }
                }
            });
        });

        // Add smooth animations for form interactions
        const allInputs = document.querySelectorAll('input, select, textarea');
        allInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-2px)';
            });

            input.addEventListener('blur', function() {
                if (!this.matches(':focus')) {
                    this.style.transform = 'translateY(0)';
                }
            });
        });
    </script>
</body>
</html>