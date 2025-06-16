<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
        }
        .admin-header {
            background: #fff;
            color: #ff6b35;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .admin-nav {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70px;
        }
        .admin-menu {
            display: flex;
            gap: 2.5rem;
        }
        .admin-menu a {
            color: #fff;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.08);
        }
        .admin-menu a:hover, .admin-menu a.active {
            background: #fff;
            color: #ff6b35;
            border: 2px solid #ff6b35;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.15);
        }
        .main-content {
            padding-top: 90px;
            max-width: 1200px;
            margin: 0 auto;
        }
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.4);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #222;
            border-radius: 24px;
            max-width: 480px;
            width: 95%;
            margin: auto;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            position: relative;
            padding: 40px;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        .modal-title {
            color: #e0e0e0;
            font-size: 1.5rem;
            margin: 0;
        }
        .modal-close {
            position: absolute;
            top: 18px;
            right: 28px;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }
        .input-group {
            margin-bottom: 16px;
        }
        .input-group label {
            color: #a0a0a0;
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
        .input-group input, .input-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-size: 1rem;
        }
        .input-group textarea {
            resize: vertical;
        }
        .submit-button {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s, transform 0.2s;
        }
        .submit-button:hover {
            background: #fff;
            color: #ff6b35;
            transform: translateY(-2px);
        }
        .alert {
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 16px;
            display: none;
        }
        .alert-success {
            background: rgba(76, 175, 80, 0.1);
            color: #4CAF50;
        }
        .alert-error {
            background: rgba(244, 67, 54, 0.1);
            color: #F44336;
        }
        .password-requirements {
            font-size: 0.9rem;
            color: #a0a0a0;
            margin-top: 4px;
        }
        .password-strength {
            height: 8px;
            border-radius: 4px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.2);
            margin-top: 4px;
        }
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s;
        }
        .strength-weak {
            background: #f44336;
        }
        .strength-fair {
            background: #ff9800;
        }
        .strength-good {
            background: #ffc107;
        }
        .strength-strong {
            background: #4caf50;
        }
        .password-match-indicator {
            font-size: 0.9rem;
            margin-top: 4px;
        }
        .match-success {
            color: #4CAF50;
        }
        .match-error {
            color: #F44336;
        }
    </style>
</head>
<body>
    <header class="admin-header">
        <nav class="admin-nav">
            <div class="admin-menu">
                <a href="create_account.php">Create Account</a>
                <a href="pending_cancel_orders.php">Pending Cancel Orders</a>
                <a href="manage_trips.php">Manage Trips</a>
                <a href="view_sales.php">View Sales</a>
            </div>
        </nav>
    </header>
    <main class="main-content">
        <!-- Registration Modal (hidden by default) -->
        <div id="adminRegModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Create Account</h1>
                    <span id="adminRegModalClose" class="modal-close">&times;</span>
                </div>
                <div class="form-content">
                    <div id="adminAlertSuccess" class="alert alert-success" style="display:none;">
                        🎉 Registration successful!
                    </div>
                    <div id="adminAlertError" class="alert alert-error" style="display:none;">
                        ⚠️ Please fill in all required fields correctly.
                    </div>
                    <form id="adminRegistrationForm">
                        <div class="input-group">
                            <label for="adminRegUsername">Username <span class="required-mark">*</span></label>
                            <input type="text" id="adminRegUsername" name="username" placeholder="Create your username" required>
                        </div>
                        <div class="input-group">
                            <label for="adminRegPassword">Password <span class="required-mark">*</span></label>
                            <input type="password" id="adminRegPassword" name="password" placeholder="Create a secure password" required>
                            <div class="password-requirements">
                                Password must be at least 8 characters with uppercase, lowercase, number, and special character
                            </div>
                            <div class="password-strength">
                                <div class="password-strength-bar" id="adminPasswordStrengthBar"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="adminConfirmPassword">Confirm Password <span class="required-mark">*</span></label>
                            <input type="password" id="adminConfirmPassword" name="confirmPassword" placeholder="Confirm your password" required>
                            <div class="password-match-indicator" id="adminPasswordMatchIndicator"></div>
                        </div>
                        <div style="height: 32px;"></div>
                        <div class="form-subtitle" style="margin-bottom: 16px; font-weight: 600; color: #b1c695;">
                            Admin Details
                        </div>
                        <div class="input-group">
                            <label for="adminFullname">Full Name <span class="required-mark">*</span></label>
                            <input type="text" id="adminFullname" name="fullname" placeholder="Enter full name" required>
                        </div>
                        <div class="input-group">
                            <label for="adminEmail">Email Address <span class="required-mark">*</span></label>
                            <input type="email" id="adminEmail" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="input-group">
                            <label for="adminPhone">Phone Number <span class="required-mark">*</span></label>
                            <input type="tel" id="adminPhone" name="phone" placeholder="Enter phone number" required>
                        </div>
                        <div class="input-group">
                            <label for="adminAddress">Address</label>
                            <textarea id="adminAddress" name="address" placeholder="Enter full address"></textarea>
                        </div>
                        <button type="submit" class="submit-button">Register</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- ...rest of your admin panel content... -->
    </main>

    <!-- Add this script before </body> -->
    <script>
    document.querySelector('.admin-menu a[href="create_account.php"]').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('adminRegModal').style.display = 'flex';
    });

    // Registration logic (adapted from cuslogin&regform.php)
    const adminForm = document.getElementById('adminRegistrationForm');
    const adminSuccessAlert = document.getElementById('adminAlertSuccess');
    const adminErrorAlert = document.getElementById('adminAlertError');
    const adminPasswordInput = document.getElementById('adminRegPassword');
    const adminConfirmPasswordInput = document.getElementById('adminConfirmPassword');
    const adminPasswordStrengthBar = document.getElementById('adminPasswordStrengthBar');
    const adminPasswordMatchIndicator = document.getElementById('adminPasswordMatchIndicator');
    let adminUsers = [];

    function checkPasswordStrength(password) {
        let strength = 0;
        if (password.length >= 8) strength += 1;
        if (/[a-z]/.test(password)) strength += 1;
        if (/[A-Z]/.test(password)) strength += 1;
        if (/[0-9]/.test(password)) strength += 1;
        if (/[^A-Za-z0-9]/.test(password)) strength += 1;
        return strength;
    }

    adminPasswordInput.addEventListener('input', function() {
        const password = this.value;
        const strength = checkPasswordStrength(password);
        adminPasswordStrengthBar.className = 'password-strength-bar';
        if (password.length === 0) {
            adminPasswordStrengthBar.style.width = '0%';
        } else if (strength <= 2) {
            adminPasswordStrengthBar.classList.add('strength-weak');
        } else if (strength === 3) {
            adminPasswordStrengthBar.classList.add('strength-fair');
        } else if (strength === 4) {
            adminPasswordStrengthBar.classList.add('strength-good');
        } else {
            adminPasswordStrengthBar.classList.add('strength-strong');
        }
    });

    function checkAdminPasswordMatch() {
        const password = adminPasswordInput.value;
        const confirmPassword = adminConfirmPasswordInput.value;
        if (confirmPassword.length === 0) {
            adminPasswordMatchIndicator.textContent = '';
            adminPasswordMatchIndicator.className = 'password-match-indicator';
            return;
        }
        if (password === confirmPassword) {
            adminPasswordMatchIndicator.textContent = '✓ Passwords match';
            adminPasswordMatchIndicator.className = 'password-match-indicator match-success';
        } else {
            adminPasswordMatchIndicator.textContent = '✗ Passwords do not match';
            adminPasswordMatchIndicator.className = 'password-match-indicator match-error';
        }
    }
    adminConfirmPasswordInput.addEventListener('input', checkAdminPasswordMatch);
    adminPasswordInput.addEventListener('input', checkAdminPasswordMatch);

    adminForm.addEventListener('submit', function(e) {
        e.preventDefault();
        adminSuccessAlert.style.display = 'none';
        adminErrorAlert.style.display = 'none';

        const formData = new FormData(adminForm);
        const userData = {};
        for (let [key, value] of formData.entries()) {
            userData[key] = value;
        }

        // Validate required fields
        const requiredFields = ['username', 'fullname', 'email', 'phone', 'password', 'confirmPassword'];
        let isValid = true;
        requiredFields.forEach(field => {
            const input = document.getElementById('admin' + field.charAt(0).toUpperCase() + field.slice(1));
            if (!userData[field] || userData[field].trim() === '') {
                if (input) {
                    input.style.borderColor = 'rgba(150, 100, 100, 0.8)';
                    input.style.background = 'rgba(90, 60, 60, 0.3)';
                }
                isValid = false;
            } else {
                if (input) {
                    input.style.borderColor = 'rgba(100, 150, 100, 0.8)';
                    input.style.background = 'rgba(60, 90, 60, 0.3)';
                }
            }
        });

        // Check if username already exists
        if (adminUsers.find(u => u.username === userData.username)) {
            document.getElementById('adminRegUsername').style.borderColor = 'rgba(150, 100, 100, 0.8)';
            document.getElementById('adminRegUsername').style.background = 'rgba(90, 60, 60, 0.3)';
            alert('Username already exists. Please choose a different username.');
            isValid = false;
        }

        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailInput = document.getElementById('adminEmail');
        if (userData.email && !emailRegex.test(userData.email)) {
            emailInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
            emailInput.style.background = 'rgba(90, 60, 60, 0.3)';
            isValid = false;
        }

        // Password validation
        const strength = checkPasswordStrength(userData.password);
        if (strength < 5) {
            adminPasswordInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
            adminPasswordInput.style.background = 'rgba(90, 60, 60, 0.3)';
            isValid = false;
        }

        // Password match validation
        if (userData.password !== userData.confirmPassword) {
            adminConfirmPasswordInput.style.borderColor = 'rgba(150, 100, 100, 0.8)';
            adminConfirmPasswordInput.style.background = 'rgba(90, 60, 60, 0.3)';
            isValid = false;
        }

        if (isValid) {
            delete userData.confirmPassword;
            userData.hashedPassword = userData.password; // Placeholder for hashed password
            delete userData.password;
            userData.registrationDate = new Date().toISOString();
            userData.userId = 'ADM' + Date.now();
            adminUsers.push(userData);

            adminSuccessAlert.style.display = 'block';
            adminForm.reset();
            adminPasswordStrengthBar.style.width = '0%';
            adminPasswordStrengthBar.className = 'password-strength-bar';
            adminPasswordMatchIndicator.textContent = '';
            adminPasswordMatchIndicator.className = 'password-match-indicator';

            // Reset input styles
            const inputs = adminForm.querySelectorAll('input, select, textarea');
            inputs.forEach(input => {
                input.style.borderColor = 'rgba(100, 100, 100, 0.3)';
                input.style.background = 'rgba(40, 40, 40, 0.8)';
            });

            setTimeout(() => {
                document.getElementById('adminRegModal').style.display = 'none';
            }, 2000);
        } else {
            adminErrorAlert.style.display = 'block';
        }
    });

    // Close modal event
    document.getElementById('adminRegModalClose').addEventListener('click', function() {
        document.getElementById('adminRegModal').style.display = 'none';
    });
    </script>
</body>
</html>