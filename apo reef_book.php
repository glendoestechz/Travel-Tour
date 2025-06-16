<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apo Reef Packages</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .header {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }
        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .main-content {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }
        .section-title {
            text-align: center;
            margin: 3rem 0 2rem 0;
        }
        .section-title h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1rem;
        }
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto 3rem auto;
            padding: 0 2rem;
        }
        .package-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .package-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 50px rgba(0,0,0,0.13);
        }
        .package-image {
            height: 180px;
            width: 100%;
            object-fit: cover;
        }
        .package-info {
            padding: 2rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .package-info h3 {
            font-size: 1.4rem;
            color: #ff6b35;
            margin-bottom: 1rem;
        }
        .package-duration {
            font-size: 1.05rem;
            color: #f7931e;
            margin-bottom: 0.7rem;
            font-weight: 600;
        }
        .activities-list {
            margin: 0 0 1.5rem 0;
            padding: 0;
            list-style: none;
        }
        .activities-list li {
            margin-bottom: 0.5rem;
            color: #333;
            padding-left: 1.2em;
            position: relative;
        }
        .activities-list li::before {
            content: "✓";
            color: #f7931e;
            position: absolute;
            left: 0;
        }
        .btn-back {
            display: inline-block;
            margin: 2rem 0 0 2rem;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
            padding: 0.7rem 2rem;
            border: none;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2);
        }
        .btn-back:hover {
            background: linear-gradient(135deg, #f7931e 0%, #ff6b35 100%);
            color: #fff;
            transform: translateY(-2px);
        }
        .btn-book {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: #fff;
            border: none;
            border-radius: 25px;
            padding: 0.7rem 1.8rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
            transition: all 0.2s;
            box-shadow: 0 4px 15px rgba(255, 107, 53, 0.15);
        }
        .btn-book:hover {
            background: linear-gradient(135deg, #f7931e 0%, #ff6b35 100%);
            color: #fff;
            transform: translateY(-2px);
        }
        @media (max-width: 700px) {
            .section-title h2 {
                font-size: 1.5rem;
            }
            .package-info {
                padding: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="nav-container">
            <div class="logo">Travel Adventures</div>
        </div>
    </header>
    <main class="main-content">
        <div class="section-title">
            <h2>Apo Reef (Occidental Mindoro) Packages</h2>
            <p>Choose your adventure! Each package includes unique activities for an unforgettable experience.</p>
        </div>
        <div class="packages-grid">
            <!-- Apo Reef Natural Park Package -->
            <div class="package-card">
                <img class="package-image" src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apo Reef Natural Park">
                <div class="package-info">
                    <h3>Apo Reef Natural Park</h3>
                    <div class="package-duration">3D2N</div>
                    <ul class="activities-list">
                        <li>Scuba Diving</li>
                        <li>Snorkeling</li>
                        <li>Marine Wildlife Watching</li>
                    </ul>
                    <button class="btn-book" onclick="openBookingForm('Apo Reef Natural Park', ['Scuba Diving','Snorkeling','Marine Wildlife Watching'], '3D2N')">Book Now</button>
                </div>
            </div>
            <!-- Camp Area Package -->
            <div class="package-card">
                <img class="package-image" src="https://images.unsplash.com/photo-1464983953574-0892a716854b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Camp Area">
                <div class="package-info">
                    <h3>Camp Area</h3>
                    <div class="package-duration">3D2N</div>
                    <ul class="activities-list">
                        <li>Camping</li>
                        <li>Stargazing</li>
                        <li>Sunrise Viewing</li>
                    </ul>
                    <button class="btn-book" onclick="openBookingForm('Camp Area', ['Camping','Stargazing','Sunrise Viewing'], '3D2N')">Book Now</button>
                </div>
            </div>
            <!-- Lighthouse Point Package -->
            <div class="package-card">
                <img class="package-image" src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Lighthouse Point">
                <div class="package-info">
                    <h3>Lighthouse Point</h3>
                    <div class="package-duration">3D2N</div>
                    <ul class="activities-list">
                        <li>Sightseeing</li>
                        <li>Photography</li>
                        <li>Light Trekking</li>
                    </ul>
                    <button class="btn-book" onclick="openBookingForm('Lighthouse Point', ['Sightseeing','Photography','Light Trekking'], '3D2N')">Book Now</button>
                </div>
            </div>
        </div>
        <a href="homepage.php" class="btn-back">← Back to Homepage</a>
    </main>
    <!-- Booking Modal -->
    <div id="bookingModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="modalPackageName"></h2>
                <div id="modalDuration" class="package-duration" style="font-weight:bold; margin-bottom:0.5rem;"></div>
                <div id="modalActivities" class="modal-activities"></div>
            </div>
            <form id="bookingForm" class="modal-body" onsubmit="return false;">
                <div class="form-group">
                    <label for="hotel">Hotel</label>
                    <select id="hotel" name="hotel" required>
                        <option value="">Select Hotel</option>
                        <option value="Apo Reef Resort">Apo Reef Resort</option>
                        <option value="Camp Area Lodge">Camp Area Lodge</option>
                        <option value="Lighthouse Point Inn">Lighthouse Point Inn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" id="date" name="date" required min="">
                </div>
                <div class="form-group">
                    <label for="guests">Number of Guests</label>
                    <input type="number" id="guests" name="guests" min="1" value="1" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="">Select City</option>
                        <option value="Manila">Manila</option>
                        <option value="Makati">Makati</option>
                        <option value="Taguig">Taguig</option>
                        <option value="Pasay">Pasay</option>
                        <option value="Caloocan">Caloocan</option>
                        <option value="Dasmarinas">Dasmarinas</option>
                    </select>
                </div>
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="transport" name="transport">
                    <label for="transport">Include transportation</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeBookingForm()">Cancel</button>
                    <button type="button" class="btn-next" onclick="nextStep()">Next</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Payment Modal -->
    <div id="paymentModal" class="modal-overlay">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Payment Details</h2>
            </div>
            <form id="paymentForm" class="modal-body" onsubmit="return false;">
                <div class="summary-section">
                    <div class="summary-table">
                        <div class="summary-row">
                            <div class="summary-label">Package Price:</div>
                            <div class="summary-value" id="summaryPackagePrice"></div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">Number of Guests:</div>
                            <div class="summary-value" id="summaryGuests"></div>
                        </div>
                        <div class="summary-row" id="transpoRow">
                            <div class="summary-label" id="transpoLabel">Transpo Price:</div>
                            <div class="summary-value" id="summaryTransportPrice"></div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">Hotel Price:</div>
                            <div class="summary-value" id="summaryHotelPrice"></div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">Sub Total:</div>
                            <div class="summary-value" id="summarySubtotal"></div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">Travel Tax:</div>
                            <div class="summary-value" id="summaryTravelTax"></div>
                        </div>
                        <div class="summary-row">
                            <div class="summary-label">VAT:</div>
                            <div class="summary-value" id="summaryVAT"></div>
                        </div>
                    </div>
                    <div class="total-row">
                        <span>Total Amount:</span>
                        <span id="summaryTotalAmount"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="paymentMethod">Payment Method:</label>
                    <select id="paymentMethod" name="paymentMethod" required>
                        <option value="">Select Payment Method</option>
                        <option value="CASH">CASH</option>
                        <option value="BANK">BANK</option>
                        <option value="GCASH">GCASH</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="goBackToBooking()">Go Back</button>
                    <button type="button" class="btn-next" onclick="proceedPayment()">Proceed</button>
                </div>
            </form>
        </div>
    </div>

    <style>
    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        z-index: 3000;
        left: 0; top: 0;
        width: 100vw; height: 100vh;
        background: rgba(0,0,0,0.6);
        justify-content: center;
        align-items: center;
    }
    .modal-overlay.active {
        display: flex;
    }
    .modal-content {
        background: #fff;
        border-radius: 18px;
        max-width: 400px;
        width: 95%;
        box-shadow: 0 10px 40px rgba(0,0,0,0.18);
        overflow: hidden;
        animation: fadeInUp 0.4s;
    }
    .modal-header {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: #fff;
        padding: 1.5rem 2rem 1rem 2rem;
    }
    .modal-header h2 {
        margin: 0 0 0.5rem 0;
        font-size: 1.5rem;
    }
    .package-duration {
        font-size: 1.05rem;
        color: #ffe7d0;
    }
    .modal-activities {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }
    .modal-activities ul {
        margin: 0.5rem 0 0 1.2rem;
        padding: 0;
    }
    .modal-body {
        padding: 2rem;
    }
    .form-group {
        margin-bottom: 1.2rem;
    }
    .form-group label {
        display: block;
        margin-bottom: 0.4rem;
        font-weight: 500;
        color: #333;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 0.6rem 1rem;
        border: 1.5px solid #e1e5e9;
        border-radius: 8px;
        font-size: 1rem;
        font-family: inherit;
    }
    .form-group input[type="checkbox"] {
        width: auto;
        margin-right: 0.5rem;
    }
    .checkbox-group {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        margin-top: 1.5rem;
    }
    .btn-cancel, .btn-next {
        padding: 0.7rem 1.7rem;
        border: none;
        border-radius: 25px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-cancel {
        background: #eee;
        color: #333;
    }
    .btn-cancel:hover {
        background: #ddd;
    }
    .btn-next {
        background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
        color: #fff;
    }
    .btn-next:hover {
        background: linear-gradient(135deg, #f7931e 0%, #ff6b35 100%);
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px);}
        to { opacity: 1; transform: translateY(0);}
    }
    .summary-section {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 1.2rem 1rem;
        margin-bottom: 1.5rem;
    }
    .summary-table {
        width: 100%;
        display: table;
        margin-bottom: 1.2rem;
    }
    .summary-row {
        display: table-row;
    }
    .summary-label, .summary-value {
        display: table-cell;
        padding: 0.5rem 0.7rem 0.5rem 0;
        font-size: 1rem;
        vertical-align: middle;
    }
    .summary-label {
        font-weight: 500;
        color: #333;
        min-width: 140px;
        width: 60%;
    }
    .summary-value {
        color: #444;
        text-align: right;
        min-width: 100px;
        width: 40%;
    }
    .total-row {
        font-weight: bold;
        color: #ff6b35;
        border-top: 1px solid #eee;
        padding-top: 0.7rem;
        margin-top: 0.7rem;
        display: flex;
        justify-content: space-between;
        font-size: 1.1rem;
    }
    </style>
    <script>
    let bookingData = {};

    function openBookingForm(packageName, activities, duration) {
        document.getElementById('modalPackageName').textContent = packageName;
        document.getElementById('modalDuration').textContent = duration;
        let actList = '<ul>';
        activities.forEach(function(act) {
            actList += '<li>' + act + '</li>';
        });
        actList += '</ul>';
        document.getElementById('modalActivities').innerHTML = actList;

        // Set today's date as min for date input
        let today = new Date().toISOString().split('T')[0];
        document.getElementById('date').min = today;
        document.getElementById('date').value = '';

        // Reset form fields
        document.getElementById('hotel').selectedIndex = 0;
        document.getElementById('guests').value = 1;
        document.getElementById('city').selectedIndex = 0;
        document.getElementById('transport').checked = false;

        document.getElementById('bookingModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }
    function closeBookingForm() {
        document.getElementById('bookingModal').classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    function nextStep() {
        // Collect booking form data
        bookingData.packageName = document.getElementById('modalPackageName').textContent;
        bookingData.duration = document.getElementById('modalDuration').textContent;
        bookingData.hotel = document.getElementById('hotel').value;
        bookingData.date = document.getElementById('date').value;
        bookingData.guests = document.getElementById('guests').value;
        bookingData.city = document.getElementById('city').value;
        bookingData.transport = document.getElementById('transport').checked;

        // Fill payment summary (leave prices blank as requested)
        document.getElementById('summaryPackagePrice').textContent = '';
        document.getElementById('summaryHotelPrice').textContent = '';
        document.getElementById('summaryTransportPrice').textContent = bookingData.transport ? '' : '';
        document.getElementById('transpoLabel').style.visibility = bookingData.transport ? 'visible' : 'hidden';
        document.getElementById('summaryGuests').textContent = bookingData.guests;
        document.getElementById('summarySubtotal').textContent = '';
        document.getElementById('summaryTravelTax').textContent = '';
        document.getElementById('summaryVAT').textContent = '';
        document.getElementById('summaryTotalAmount').textContent = '';

        // Show payment modal, hide booking modal
        document.getElementById('bookingModal').classList.remove('active');
        document.getElementById('paymentModal').classList.add('active');
    }

    function goBackToBooking() {
        document.getElementById('paymentModal').classList.remove('active');
        document.getElementById('bookingModal').classList.add('active');
    }

    function proceedPayment() {
        const paymentMethod = document.getElementById('paymentMethod').value;
        if (!paymentMethod) {
            alert('Please select a payment method.');
            return;
        }
        if (confirm('Do you want to proceed?')) {
            alert('Thank you for your booking!');
            document.getElementById('paymentModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
    }

    // Optional: Close modal when clicking outside the form
    document.getElementById('bookingModal').addEventListener('click', function(e) {
        if (e.target === this) closeBookingForm();
    });
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeBookingForm();
    });
    document.getElementById('paymentModal').addEventListener('click', function(e) {
        if (e.target === this) goBackToBooking();
    });
    </script>
</body>
</html>