<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel Sidebar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 240px;
            background: #fff;
            box-shadow: 2px 0 10px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
            padding-top: 40px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 100;
        }
        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            margin-top: 2rem;
        }
        .sidebar-menu button {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 0.9rem 1.2rem;
            font-size: 1.1rem;
            font-weight: 600;
            margin: 0 1.2rem;
            cursor: pointer;
            transition: background 0.2s, color 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.08);
            text-align: left;
        }
        .sidebar-menu button.active,
        .sidebar-menu button:hover {
            background: #fff;
            color: #ff6b35;
            border: 2px solid #ff6b35;
        }
        .main-content {
            margin-left: 240px;
            padding: 40px 32px 32px 32px;
            width: 100%;
        }
        .dashboard-section {
            display: none;
            animation: fadeIn 0.3s;
        }
        .dashboard-section.active {
            display: block;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px);}
            to { opacity: 1; transform: translateY(0);}
        }
        .dashboard-title {
            font-size: 2rem;
            font-weight: bold;
            color: #ff6b35;
            margin-bottom: 1.5rem;
        }
        /* Add this to your <style> section for the sales table */
        #salesTable th, #salesTable td {
            text-align: center;
            vertical-align: middle;
            padding: 0.7rem 0.5rem;
            border-bottom: 1px solid #eee;
            font-size: 1rem;
        }
        #salesTable th {
            background: #ffe5d0;
            font-weight: 600;
        }
        #salesTable td {
            background: #fff;
        }
        /* Responsive */
        @media (max-width: 700px) {
            .sidebar {
                width: 100vw;
                height: auto;
                flex-direction: row;
                position: static;
                box-shadow: none;
                padding-top: 0;
            }
            .sidebar-menu {
                flex-direction: row;
                gap: 0.5rem;
                margin: 0.5rem 0;
            }
            .sidebar-menu button {
                margin: 0 0.5rem;
                padding: 0.7rem 0.9rem;
                font-size: 1rem;
            }
            .main-content {
                margin-left: 0;
                padding: 24px 8px 8px 8px;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <nav class="sidebar-menu">
            <button class="active" onclick="showDashboard('create')">Create Employee Accounts</button>
            <button onclick="showDashboard('cancel')">Cancellation Bookings</button>
            <button onclick="showDashboard('sales')">View Sales</button>
            <button onclick="showDashboard('trips')">Manage Trips</button>
        </nav>
    </aside>
    <main class="main-content">
        <section id="dashboard-create" class="dashboard-section active">
            <div class="dashboard-title">Create Employee Accounts</div>
            <form id="employeeForm" style="max-width:400px;background:#fff;padding:32px 28px 24px 28px;border-radius:18px;box-shadow:0 4px 24px rgba(0,0,0,0.07);">
                <div style="margin-bottom:1.2rem;">
                    <label for="empUsername" style="font-weight:600;">Username</label>
                    <input type="text" id="empUsername" name="username" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>
                <div style="margin-bottom:1.2rem;">
                    <label for="empPassword" style="font-weight:600;">Password</label>
                    <input type="password" id="empPassword" name="password" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>
                <div style="margin-bottom:1.7rem;">
                    <label for="empRole" style="font-weight:600;">Role</label>
                    <select id="empRole" name="role" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                        <option value="">Select Role</option>
                        <option value="STAFF">STAFF</option>
                        <option value="ADMIN">ADMIN</option>
                    </select>
                </div>
                <hr style="margin:1.5rem 0;">
                <div style="margin-bottom:1.2rem;">
                    <label for="empFullName" style="font-weight:600;">Full Name</label>
                    <input type="text" id="empFullName" name="fullname" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>
                <div style="margin-bottom:1.7rem;">
                    <label for="empContact" style="font-weight:600;">Contact Number</label>
                    <input type="text" id="empContact" name="contact" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>
                <button type="submit" style="width:100%;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);color:#fff;font-weight:600;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:25px;cursor:pointer;transition:background 0.2s;">
                    Create Account
                </button>
                <div id="empFormMsg" style="margin-top:1.2rem;font-weight:500;"></div>
            </form>
        </section>
        <section id="dashboard-cancel" class="dashboard-section">
            <div class="dashboard-title">Cancellation Bookings</div>
            <div style="overflow-x:auto;">
                <table id="cancelTable" style="width:100%;border-collapse:collapse;background:#fff;">
                    <thead>
                        <tr style="background:#ffe5d0;">
                            <th style="padding:0.8rem 0.5rem;">Booking ID</th>
                            <th style="padding:0.8rem 0.5rem;">Customer ID</th>
                            <th style="padding:0.8rem 0.5rem;">Booking Date</th>
                            <th style="padding:0.8rem 0.5rem;">Total Price</th>
                            <th style="padding:0.8rem 0.5rem;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Cancellation records will be inserted here -->
                    </tbody>
                </table>
            </div>
        </section>
        <section id="dashboard-sales" class="dashboard-section">
            <div class="dashboard-title">View Sales</div>
            <div style="display:flex;flex-wrap:wrap;gap:1rem;align-items:center;margin-bottom:1.5rem;">
                <input type="text" id="searchBookingId" placeholder="Search Booking ID..." style="padding:0.6rem 1rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                <select id="filterPaymentMethod" style="padding:0.6rem 1rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                    <option value="">All Payment Methods</option>
                    <option value="CASH">CASH</option>
                    <option value="GCASH">GCASH</option>
                    <option value="BANK">BANK</option>
                </select>
            </div>
            <div style="overflow-x:auto;">
                <table id="salesTable" style="width:100%;border-collapse:collapse;background:#fff;">
                    <thead>
                        <tr style="background:#ffe5d0;">
                            <th style="padding:0.8rem 0.5rem;">Sales ID</th>
                            <th style="padding:0.8rem 0.5rem;">Booking ID</th>
                            <th style="padding:0.8rem 0.5rem;">Sub Total</th>
                            <th style="padding:0.8rem 0.5rem;">Travel Tax</th>
                            <th style="padding:0.8rem 0.5rem;">VAT</th>
                            <th style="padding:0.8rem 0.5rem;">Total Price</th>
                            <th style="padding:0.8rem 0.5rem;">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sales records will be inserted here -->
                    </tbody>
                </table>
            </div>
        </section>
        <section id="dashboard-trips" class="dashboard-section">
            <div class="dashboard-title">Manage Trips</div>
            <div style="margin-bottom:2rem;">
                <select id="tripTableSelect" style="padding:0.6rem 1rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                    <option value="Packages">Packages</option>
                    <option value="Destinations">Destinations</option>
                    <option value="Activities">Activities</option>
                    <option value="Hotels">Hotels</option>
                    <option value="Transportations">Transportations</option>
                </select>
                <button onclick="showAddTripForm()" style="margin-left:1rem;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);color:#fff;font-weight:600;padding:0.6rem 1.5rem;border:none;border-radius:25px;cursor:pointer;">Add New</button>
            </div>
            <div id="tripTableContainer"></div>
            <div id="tripFormModal" style="display:none;position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(0,0,0,0.3);z-index:2000;justify-content:center;align-items:center;">
                <div id="tripFormContent" style="background:#fff;padding:2rem 2.5rem;border-radius:18px;max-width:420px;width:95%;margin:auto;box-shadow:0 10px 40px rgba(0,0,0,0.18);position:relative;">
                    <!-- Dynamic form will be injected here -->
                </div>
            </div>
        </section>
    </main>
    <script>
        function showDashboard(section) {
            // Remove active class from all buttons
            document.querySelectorAll('.sidebar-menu button').forEach(btn => btn.classList.remove('active'));
            // Hide all dashboard sections
            document.querySelectorAll('.dashboard-section').forEach(sec => sec.classList.remove('active'));
            // Show the selected section and highlight the button
            if(section === 'create') {
                document.querySelector('.sidebar-menu button:nth-child(1)').classList.add('active');
                document.getElementById('dashboard-create').classList.add('active');
            } else if(section === 'cancel') {
                document.querySelector('.sidebar-menu button:nth-child(2)').classList.add('active');
                document.getElementById('dashboard-cancel').classList.add('active');
            } else if(section === 'sales') {
                document.querySelector('.sidebar-menu button:nth-child(3)').classList.add('active');
                document.getElementById('dashboard-sales').classList.add('active');
            } else if(section === 'trips') {
                document.querySelector('.sidebar-menu button:nth-child(4)').classList.add('active');
                document.getElementById('dashboard-trips').classList.add('active');
            }
        }

        // Simple form handler for demo
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('employeeForm').onsubmit = function(e) {
                e.preventDefault();
                const msg = document.getElementById('empFormMsg');
                msg.style.color = "#ff6b35";
                msg.textContent = "Employee account created successfully!";
                this.reset();
                setTimeout(()=>{ msg.textContent = ""; }, 2500);
            };
        });

        const salesData = [
            {Sales_ID: 'S001', Booking_ID: 'B1001', Sub_Total: 8000, Travel_Tax: 500, VAT: 960, Total_Price: 9460, Payment_Method: 'CASH'},
            {Sales_ID: 'S002', Booking_ID: 'B1002', Sub_Total: 12000, Travel_Tax: 800, VAT: 1440, Total_Price: 14240, Payment_Method: 'GCASH'},
            {Sales_ID: 'S003', Booking_ID: 'B1003', Sub_Total: 9500, Travel_Tax: 600, VAT: 1140, Total_Price: 11240, Payment_Method: 'BANK'},
            {Sales_ID: 'S004', Booking_ID: 'B1004', Sub_Total: 7000, Travel_Tax: 400, VAT: 840, Total_Price: 8240, Payment_Method: 'CASH'},
            {Sales_ID: 'S005', Booking_ID: 'B1005', Sub_Total: 15000, Travel_Tax: 1000, VAT: 1800, Total_Price: 17800, Payment_Method: 'GCASH'}
        ];

        function renderSalesTable(data) {
            const tbody = document.querySelector('#salesTable tbody');
            tbody.innerHTML = '';
            if (data.length === 0) {
                tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;padding:1.5rem;">No records found.</td></tr>`;
                return;
            }
            data.forEach(row => {
                tbody.innerHTML += `
                    <tr>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Sales_ID}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Booking_ID}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">₱${row.Sub_Total.toLocaleString()}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">₱${row.Travel_Tax.toLocaleString()}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">₱${row.VAT.toLocaleString()}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">₱${row.Total_Price.toLocaleString()}</td>
                        <td style="padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Payment_Method}</td>
                    </tr>
                `;
            });
        }

        function filterSales() {
            const search = document.getElementById('searchBookingId').value.trim().toLowerCase();
            const payment = document.getElementById('filterPaymentMethod').value;
            let filtered = salesData.filter(row => 
                row.Booking_ID.toLowerCase().includes(search) &&
                (payment === '' || row.Payment_Method === payment)
            );
            renderSalesTable(filtered);
        }

        document.getElementById('searchBookingId').addEventListener('input', filterSales);
        document.getElementById('filterPaymentMethod').addEventListener('change', filterSales);

        // Initial render
        renderSalesTable(salesData);

        const tripData = {
            Packages: [
                {Package_ID: 1, Destination_ID: 1, P_Name: "Island Adventure", Base_Price: 5000},
                {Package_ID: 2, Destination_ID: 2, P_Name: "Beach Escape", Base_Price: 7000}
            ],
            Destinations: [
                {Destination_ID: 1, D_Name: "Puerto Galera", Description: "Beautiful beaches"},
                {Destination_ID: 2, D_Name: "Apo Reef", Description: "Diving paradise"}
            ],
            Activities: [
                {Activity_ID: 1, A_Name: "Snorkeling"},
                {Activity_ID: 2, A_Name: "Kayaking"}
            ],
            Hotels: [
                {Hotel_ID: 1, H_Name: "Sunset Resort", Location: "Puerto Galera", Base_Price: 2500},
                {Hotel_ID: 2, H_Name: "Reef Hotel", Location: "Apo Reef", Base_Price: 3200}
            ],
            Transportations: [
                {Transportation_ID: 1, Type: "Ferry", From: "Batangas", To: "Puerto Galera", Departure_Time: "08:00", Arrival_Time: "10:00", Base_Price: "500"}
            ]
        };

        const tableFields = {
            Packages: [
                {name: "Package_ID", label: "Package ID", type: "number", readonly: true},
                {name: "Destination_ID", label: "Destination ID", type: "number"},
                {name: "P_Name", label: "Package Name", type: "text"},
                {name: "Base_Price", label: "Base Price", type: "number"}
            ],
            Destinations: [
                {name: "Destination_ID", label: "Destination ID", type: "number", readonly: true},
                {name: "D_Name", label: "Destination Name", type: "text"},
                {name: "Description", label: "Description", type: "text"}
            ],
            Activities: [
                {name: "Activity_ID", label: "Activity ID", type: "number", readonly: true},
                {name: "A_Name", label: "Activity Name", type: "text"}
            ],
            Hotels: [
                {name: "Hotel_ID", label: "Hotel ID", type: "number", readonly: true},
                {name: "H_Name", label: "Hotel Name", type: "text"},
                {name: "Location", label: "Location", type: "text"},
                {name: "Base_Price", label: "Base Price", type: "number"}
            ],
            Transportations: [
                {name: "Transportation_ID", label: "Transportation ID", type: "number", readonly: true},
                {name: "Type", label: "Type", type: "text"},
                {name: "From", label: "From", type: "text"},
                {name: "To", label: "To", type: "text"},
                {name: "Departure_Time", label: "Departure Time", type: "text"},
                {name: "Arrival_Time", label: "Arrival Time", type: "text"},
                {name: "Base_Price", label: "Base Price", type: "text"}
            ]
        };

        function renderTripTable() {
            const tableName = document.getElementById('tripTableSelect').value;
            const data = tripData[tableName];
            const fields = tableFields[tableName];
            let html = `<table style="width:100%;border-collapse:collapse;background:#fff;"><thead><tr>`;
            fields.forEach(f => html += `<th style="padding:0.7rem 0.5rem;background:#ffe5d0;">${f.label}</th>`);
            html += `<th style="padding:0.7rem 0.5rem;background:#ffe5d0;">Actions</th></tr></thead><tbody>`;
            if (data.length === 0) {
                html += `<tr><td colspan="${fields.length+1}" style="text-align:center;padding:1.5rem;">No records found.</td></tr>`;
            } else {
                data.forEach((row, idx) => {
                    html += `<tr>`;
                    fields.forEach(f => html += `<td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row[f.name] ?? ''}</td>`);
                    html += `<td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">
                        <button onclick="editTrip('${tableName}',${idx})" style="background:#ffb366;color:#fff;border:none;border-radius:8px;padding:0.3rem 1rem;cursor:pointer;">Edit</button>
                        <button onclick="deleteTrip('${tableName}',${idx})" style="background:#e57373;color:#fff;border:none;border-radius:8px;padding:0.3rem 1rem;cursor:pointer;margin-left:0.5rem;">Delete</button>
                    </td></tr>`;
                });
            }
            html += `</tbody></table>`;
            document.getElementById('tripTableContainer').innerHTML = html;
        }

        function showAddTripForm() {
            const tableName = document.getElementById('tripTableSelect').value;
            const fields = tableFields[tableName].filter(f => !f.readonly);
            let html = `<h2 style="margin-top:0;color:#ff6b35;">Add ${tableName.slice(0,-1)}</h2>
                <form id="addTripForm">`;
            fields.forEach(f => {
                html += `<div style="margin-bottom:1.2rem;">
                    <label style="font-weight:600;">${f.label}</label>
                    <input type="${f.type}" name="${f.name}" required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>`;
            });
            html += `<button type="submit" style="width:100%;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);color:#fff;font-weight:600;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:25px;cursor:pointer;">Add</button>
                <button type="button" onclick="closeTripForm()" style="width:100%;margin-top:0.7rem;background:#eee;color:#333;font-weight:600;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:25px;cursor:pointer;">Cancel</button>
                </form>`;
            document.getElementById('tripFormContent').innerHTML = html;
            document.getElementById('tripFormModal').style.display = 'flex';

            document.getElementById('addTripForm').onsubmit = function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const newRow = {};
                fields.forEach(f => newRow[f.name] = formData.get(f.name));
                // AutoNumber simulation
                const idField = tableFields[tableName][0].name;
                newRow[idField] = tripData[tableName].length ? Math.max(...tripData[tableName].map(r=>+r[idField]||0))+1 : 1;
                tripData[tableName].push(newRow);
                closeTripForm();
                renderTripTable();
            };
        }

        function editTrip(tableName, idx) {
            const fields = tableFields[tableName];
            const row = tripData[tableName][idx];
            let html = `<h2 style="margin-top:0;color:#ff6b35;">Edit ${tableName.slice(0,-1)}</h2>
                <form id="editTripForm">`;
            fields.forEach(f => {
                html += `<div style="margin-bottom:1.2rem;">
                    <label style="font-weight:600;">${f.label}</label>
                    <input type="${f.type}" name="${f.name}" value="${row[f.name] ?? ''}" ${f.readonly ? 'readonly' : ''} required style="width:100%;padding:0.6rem 1rem;margin-top:0.3rem;border-radius:8px;border:1.5px solid #e1e5e9;font-size:1rem;">
                </div>`;
            });
            html += `<button type="submit" style="width:100%;background:linear-gradient(135deg,#ff6b35 0%,#f7931e 100%);color:#fff;font-weight:600;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:25px;cursor:pointer;">Save</button>
                <button type="button" onclick="closeTripForm()" style="width:100%;margin-top:0.7rem;background:#eee;color:#333;font-weight:600;font-size:1.1rem;padding:0.8rem 0;border:none;border-radius:25px;cursor:pointer;">Cancel</button>
                </form>`;
            document.getElementById('tripFormContent').innerHTML = html;
            document.getElementById('tripFormModal').style.display = 'flex';

            document.getElementById('editTripForm').onsubmit = function(e) {
                e.preventDefault();
                const formData = new FormData(this);
                const updatedRow = {};
                fields.forEach(f => updatedRow[f.name] = formData.get(f.name));
                tripData[tableName][idx] = updatedRow;
                closeTripForm();
                renderTripTable();
            };
        }

        function closeTripForm() {
            document.getElementById('tripFormModal').style.display = 'none';
            document.getElementById('tripFormContent').innerHTML = '';
        }

        document.getElementById('tripTableSelect').addEventListener('change', renderTripTable);

        // Initial render for trips
        renderTripTable();

        const cancelData = [
            {Booking_ID: 'B1001', Customer_ID: 'C001', Booking_Date: '2025-06-01', Total_Price: 9460},
            {Booking_ID: 'B1003', Customer_ID: 'C002', Booking_Date: '2025-06-05', Total_Price: 11240},
            {Booking_ID: 'B1007', Customer_ID: 'C003', Booking_Date: '2025-06-10', Total_Price: 8240}
        ];

        function renderCancelTable() {
            const tbody = document.querySelector('#cancelTable tbody');
            tbody.innerHTML = '';
            if (cancelData.length === 0) {
                tbody.innerHTML = `<tr><td colspan="5" style="text-align:center;padding:1.5rem;">No cancellation requests.</td></tr>`;
                return;
            }
            cancelData.forEach((row, idx) => {
                tbody.innerHTML += `
                    <tr>
                        <td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Booking_ID}</td>
                        <td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Customer_ID}</td>
                        <td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">${row.Booking_Date}</td>
                        <td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">₱${row.Total_Price.toLocaleString()}</td>
                        <td style="text-align:center;padding:0.7rem 0.5rem;border-bottom:1px solid #eee;">
                            <button onclick="authorizeCancel(${idx}, true)" style="background:#4caf50;color:#fff;border:none;border-radius:8px;padding:0.3rem 1rem;cursor:pointer;">Refundable</button>
                            <button onclick="authorizeCancel(${idx}, false)" style="background:#e57373;color:#fff;border:none;border-radius:8px;padding:0.3rem 1rem;cursor:pointer;margin-left:0.5rem;">Non-Refundable</button>
                        </td>
                    </tr>
                `;
            });
        }

        function authorizeCancel(idx, isRefundable) {
            const action = isRefundable ? "refundable" : "non-refundable";
            if (confirm(`Mark this cancellation as ${action.toUpperCase()}?`)) {
                cancelData.splice(idx, 1);
                renderCancelTable();
                alert(`Booking marked as ${action}.`);
            }
        }

        // Initial render
        renderCancelTable();
    </script>
</body>
</html>