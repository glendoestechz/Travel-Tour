<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Destinations</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: #f8f9fa;
        }

        /* Header Navigation */
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

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-menu a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            color: white;
        }

        /* Main Content */
        .main-content {
            margin-top: 80px;
            min-height: calc(100vh - 80px);
        }

        .section {
            display: none;
            padding: 50px 0;
        }

        .section.active {
            display: block;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h2 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 1rem;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Destinations Styles */
        .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .destination-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            height: 450px;
            background: white;
            text-decoration: none;
            color: inherit;
        }

        .destination-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 70px rgba(0,0,0,0.2);
        }

        .destination-image {
            height: 250px;
            background: linear-gradient(45deg, #ff6b35, #f7931e);
            border-radius: 20px 20px 0 0;
            position: relative;
            overflow: hidden;
        }

        .destination-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 20px 20px 0 0;
        }

        .destination-info {
            padding: 2rem;
            background: white;
            height: 200px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .destination-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .destination-info p {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ff6b35;
        }

        /* About Us Styles */
        .about-description {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            margin-bottom: 3rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        .about-description h3 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .about-description p {
            font-size: 1.1rem;
            color: #666;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .team-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
            font-weight: bold;
        }

        .team-card h4 {
            font-size: 1.3rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .team-card .role {
            color: #ff6b35;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .team-card p {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.animated {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-container {
                padding: 1rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .destinations-grid {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: 1fr;
            }

            .about-description {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Navigation -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">Travel Adventures</div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="#" onclick="showSection('home')" class="nav-link active">HOME</a></li>
                    <li><a href="#" onclick="showSection('about')" class="nav-link">ABOUT US</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Home Section - Destinations -->
        <section id="home" class="section active">
            <div class="container">
                <div class="section-title animate-on-scroll">
                    <h2>Popular Destinations</h2>
                    <p>Discover the Philippines' most beautiful places with our handpicked destination collection</p>
                </div>
                <div class="destinations-grid">
                    <a href="puerto galera.php" style="text-decoration:none; color:inherit;">
                        <div class="destination-card animate-on-scroll">
                            <div class="destination-image">
                                <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Puerto Galera">
                            </div>
                            <div class="destination-info">
                                <h3>Puerto Galera (Oriental Mindoro)</h3>
                                <p>Famous for its white sand beaches, vibrant coral reefs, and lively nightlife. Perfect for diving and island hopping.</p>
                                <div class="price">From ₱8,999</div>
                            </div>
                        </div>
                    </a>
                    <a href="apo reef_book.php" style="text-decoration:none; color:inherit;">
                        <div class="destination-card animate-on-scroll">
                            <div class="destination-image">
                                <img src="https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apo Reef">
                            </div>
                            <div class="destination-info">
                                <h3>Apo Reef (Occidental Mindoro)</h3>
                                <p>The largest coral reef system in the Philippines, ideal for snorkeling, diving, and marine wildlife encounters.</p>
                                <div class="price">From ₱10,499</div>
                            </div>
                        </div>
                    </a>
                    <a href="bulalacao_book.php" style="text-decoration:none; color:inherit;">
                        <div class="destination-card animate-on-scroll">
                            <div class="destination-image">
                                <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Bulalacao">
                            </div>
                            <div class="destination-info">
                                <h3>Bulalacao (Oriental Mindoro)</h3>
                                <p>Discover hidden coves, untouched islands, and tranquil waters in this peaceful southern Mindoro gem.</p>
                                <div class="price">From ₱7,499</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- About Us Section -->
        <section id="about" class="section">
            <div class="container">
                <div class="section-title animate-on-scroll">
                    <h2>About Us</h2>
                    <p>Meet the passionate team behind your unforgettable Philippine adventures</p>
                </div>

                <!-- Company Description -->
                <div class="about-description animate-on-scroll">
                    <h3>Our Story</h3>
                    <p>Travel Adventures Philippines was founded with a simple mission: to showcase the incredible beauty and rich culture of the Philippines to travelers from around the world. With over a decade of experience in the tourism industry, our team has carefully crafted unique travel experiences that combine breathtaking natural wonders, authentic cultural encounters, and comfortable accommodations. We believe that travel is not just about visiting places, but about creating lasting memories and meaningful connections with the destinations you explore.</p>
                </div>

                <!-- Team Profiles -->
                <div class="team-grid">
                    <div class="team-card animate-on-scroll">
                        <div class="team-avatar">MR</div>
                        <h4>Maria Rodriguez</h4>
                        <div class="role">Founder & CEO</div>
                        <p>With 15 years in the travel industry, Maria founded Travel Adventures to share her passion for Philippine culture and natural beauty. She personally oversees every tour to ensure exceptional experiences.</p>
                    </div>

                    <div class="team-card animate-on-scroll">
                        <div class="team-avatar">JS</div>
                        <h4>John Santos</h4>
                        <div class="role">Head Tour Guide</div>
                        <p>A certified dive master and nature enthusiast, John leads our adventure tours with infectious energy. His deep knowledge of Philippine marine life and ecosystems makes every trip educational and exciting.</p>
                    </div>

                    <div class="team-card animate-on-scroll">
                        <div class="team-avatar">AL</div>
                        <h4>Ana Lim</h4>
                        <div class="role">Cultural Experience Director</div>
                        <p>Ana specializes in creating authentic cultural immersion experiences. She works closely with local communities to ensure our tours support sustainable tourism and preserve Filipino traditions.</p>
                    </div>

                    <div class="team-card animate-on-scroll">
                        <div class="team-avatar">CT</div>
                        <h4>Carlos Torres</h4>
                        <div class="role">Adventure Activities Coordinator</div>
                        <p>Former professional athlete turned adventure guide, Carlos designs and leads all our active tours. From mountain treks to water sports, he ensures safety while maximizing the thrill factor.</p>
                    </div>

                    <div class="team-card animate-on-scroll">
                        <div class="team-avatar">LG</div>
                        <h4>Lisa Garcia</h4>
                        <div class="role">Guest Relations Manager</div>
                        <p>Lisa takes care of all guest needs from booking to departure. Her attention to detail and warm hospitality ensure that every traveler feels welcomed and well-cared for throughout their Philippine adventure.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        // Navigation functionality
        function showSection(sectionName) {
            // Hide all sections
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show selected section
            document.getElementById(sectionName).classList.add('active');
            
            // Update active nav link
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event.target.classList.add('active');

            // Re-run scroll animations for the new section
            setTimeout(() => {
                animateOnScroll();
            }, 100);
        }

        // Scroll animations
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            elements.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('animated');
                }
            });
        }

        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Run once on load

        // Add interactive effects to destination cards
        document.querySelectorAll('.destination-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-15px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(-10px) scale(1)';
            });
        });

        // Smooth scrolling when switching sections
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>