<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Animated Floating Shape Background */
    body {
        background: #0f172a; /* Deep Dark Modern Theme */
        overflow-x: hidden;
        color: white;
    }

    /* Sidebar Navigation */
    .sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: 280px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem 0;
        z-index: 999;
        overflow-y: auto;
        box-shadow: 5px 0 30px rgba(0, 0, 0, 0.5);
        
        /* Hide scrollbar but keep functionality */
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE and Edge */
    }

    /* Hide scrollbar for Chrome, Safari and Opera */
    .sidebar::-webkit-scrollbar {
        display: none;
    }

    .sidebar-logo {
        padding: 0 1.5rem;
        margin-bottom: 3rem;
        text-align: center;
    }

    .sidebar-logo h3 {
        font-size: 1.75rem;
        font-weight: 900;
        background: linear-gradient(135deg, #818cf8, #c084fc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0.5rem;
    }

    .sidebar-logo p {
        font-size: 0.875rem;
        color: #64748b;
    }

    .sidebar-menu {
        list-style: none;
        padding: 0;
    }

    .sidebar-menu li {
        margin-bottom: 0.5rem;
    }

    .sidebar-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s;
        position: relative;
        font-weight: 600;
    }

    .sidebar-link:hover {
        background: rgba(99, 102, 241, 0.1);
        color: #a5b4fc;
    }

    .sidebar-link.active {
        background: linear-gradient(90deg, rgba(99, 102, 241, 0.2), transparent);
        color: white;
        border-left: 4px solid #6366f1;
    }

    .sidebar-link i {
        width: 28px;
        margin-right: 1rem;
        font-size: 1.25rem;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 1.5rem 1.5rem;
    }

    .sidebar-cta {
        margin: 2rem 1.5rem;
        padding: 1.5rem;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 16px;
        text-align: center;
    }

    .sidebar-cta h4 {
        color: white;
        font-size: 1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .sidebar-cta p {
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.875rem;
        margin-bottom: 1rem;
    }

    .btn-sidebar-cta {
        background: white;
        color: #4f46e5;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 700;
        display: inline-block;
        transition: all 0.3s;
        font-size: 0.875rem;
    }

    .btn-sidebar-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        color: #4f46e5;
    }

    /* Mobile Toggle */
    .mobile-toggle {
        display: none;
        position: fixed;
        top: 1.5rem;
        left: 1.5rem;
        z-index: 1000;
        background: #4f46e5;
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 12px;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
    }

    /* Main Content Wrapper */
    .main-wrapper {
        margin-left: 280px;
        transition: margin-left 0.3s;
    }

    .hero-section {
        padding: 100px 0;
        position: relative;
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        background: linear-gradient(to right, #818cf8, #c084fc, #fb7185);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1.2;
    }

    /* Glassmorphism Feature Cards */
    .feature-card {
        background: rgba(255, 255, 255, 0.03);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 24px;
        padding: 30px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .feature-card:hover {
        background: rgba(255, 255, 255, 0.07);
        transform: translateY(-15px) scale(1.02);
        border-color: #818cf8;
    }

    .icon-box {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .btn-get-started {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        border: none;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-get-started:hover {
        box-shadow: 0 0 30px rgba(79, 70, 229, 0.6);
        transform: scale(1.05);
        color: white;
    }

    /* Floating Animation */
    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-20px);
        }
        100% {
            transform: translateY(0px);
        }
    }

    .floating-img {
        animation: float 6s ease-in-out infinite;
    }

    /* About Section Enhanced */
    .about-section {
        padding: 5rem 0;
    }

    .about-content {
        padding: 2rem;
    }

    .about-feature {
        margin-bottom: 2rem;
    }

    .feature-icon-box {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
    }

    .stats-box {
        background: rgba(99, 102, 241, 0.1);
        padding: 1.5rem;
        border-radius: 16px;
        border: 1px solid rgba(99, 102, 241, 0.2);
        text-align: center;
        flex: 1;
        min-width: 120px;
    }

    /* Contact Cards */
    .contact-card {
        background: rgba(99, 102, 241, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(99, 102, 241, 0.3);
        border-radius: 24px;
        padding: 2.5rem;
        text-align: center;
        transition: all 0.3s;
        height: 100%;
    }

    .contact-card:hover {
        transform: translateY(-10px);
        border-color: #818cf8;
    }

    .contact-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
    }

    .social-link {
        width: 50px;
        height: 50px;
        background: rgba(99, 102, 241, 0.2);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #818cf8;
        font-size: 1.5rem;
        text-decoration: none;
        transition: 0.3s;
    }

    .social-link:hover {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        color: white;
    }

    .cta-box {
        background: linear-gradient(135deg, #4f46e5, #7c3aed);
        border-radius: 24px;
        padding: 3rem;
        text-align: center;
        box-shadow: 0 20px 60px rgba(79, 70, 229, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .mobile-toggle {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .main-wrapper {
            margin-left: 0;
        }

        .hero-title {
            font-size: 2.5rem;
        }
    }
</style>

<!-- Mobile Toggle Button -->
<button class="mobile-toggle" onclick="toggleSidebar()">
    <i class="bi bi-list"></i>
</button>

<!-- Sidebar Navigation -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-logo">
        <h3>CampusConnect</h3>
        <p>Smart Resource Hub</p>
    </div>

    <ul class="sidebar-menu">
        <li>
            <a href="#home" class="sidebar-link active">
                <i class="bi bi-house-fill"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="#features" class="sidebar-link">
                <i class="bi bi-lightning-charge-fill"></i>
                <span>Features</span>
            </a>
        </li>
        <li>
            <a href="#about" class="sidebar-link">
                <i class="bi bi-info-circle-fill"></i>
                <span>About</span>
            </a>
        </li>
        <li>
            <a href="#contact" class="sidebar-link">
                <i class="bi bi-envelope-fill"></i>
                <span>Contact</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-divider"></div>

    <ul class="sidebar-menu">
        <li>
            <a href="<?php echo URLROOT; ?>/auth/login" class="sidebar-link">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>
        <li>
            <a href="<?php echo URLROOT; ?>/auth/register" class="sidebar-link">
                <i class="bi bi-person-plus-fill"></i>
                <span>Register</span>
            </a>
        </li>
    </ul>

    <div class="sidebar-cta">
        <h4>🚀 Ready to Start?</h4>
        <p>Join thousands of students!</p>
        <a href="<?php echo URLROOT; ?>/auth/login" class="btn-sidebar-cta">
            Get Started <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</aside>

<!-- Main Content -->
<div class="main-wrapper">
    <!-- Hero Section -->
    <div class="hero-section text-center" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 text-lg-start">
                    <h1 class="hero-title mb-4">Connecting Your Campus Resources.</h1>
                    <p class="lead opacity-75 mb-5 fs-4">
                        Experience the next generation of campus management. Book labs, classrooms, and resources with seamless AI-driven endorsements.
                    </p>
                    <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                        <a href="<?php echo URLROOT; ?>/auth/login" class="btn btn-get-started shadow-lg">Get Started Now</a>
                        <a href="#features" class="btn btn-outline-light rounded-pill px-4 py-3 border-2 fw-bold">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="floating-img text-primary" style="font-size: 15rem;">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card text-center text-md-start h-100">
                    <div class="icon-box mx-auto mx-md-0"><i class="bi bi-shield-check"></i></div>
                    <h4 class="fw-bold mb-3">Smart Endorsement</h4>
                    <p class="opacity-50 small">Automated faculty approval workflow designed for efficiency and speed.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center text-md-start h-100">
                    <div class="icon-box mx-auto mx-md-0"><i class="bi bi-lightning-charge"></i></div>
                    <h4 class="fw-bold mb-3">Instant Booking</h4>
                    <p class="opacity-50 small">Real-time availability check for labs, halls, and academic resources.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card text-center text-md-start h-100">
                    <div class="icon-box mx-auto mx-md-0"><i class="bi bi-grid-1x2"></i></div>
                    <h4 class="fw-bold mb-3">Unified Control</h4>
                    <p class="opacity-50 small">Centralized admin dashboard to manage the entire campus inventory.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section - Enhanced -->
    <div id="about" class="about-section container py-5">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3" style="background: linear-gradient(to right, #818cf8, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                About CampusConnect
            </h2>
            <p class="lead opacity-75 mx-auto" style="max-width: 600px;">
                Revolutionizing campus resource management for the digital age
            </p>
        </div>

        <div class="row g-4 align-items-center">
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="about-feature mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon-box" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                                <i class="bi bi-rocket-takeoff fs-4"></i>
                            </div>
                            <h4 class="mb-0 fw-bold">Our Mission</h4>
                        </div>
                        <p class="opacity-75">
                            Empower educational institutions with intelligent resource booking and management systems that save time and enhance productivity.
                        </p>
                    </div>

                    <div class="about-feature mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="feature-icon-box" style="background: linear-gradient(135deg, #10b981, #059669);">
                                <i class="bi bi-award fs-4"></i>
                            </div>
                            <h4 class="mb-0 fw-bold">Why Choose Us</h4>
                        </div>
                        <p class="opacity-75">
                            Industry-leading AI-powered endorsements, real-time synchronization, and a user-friendly interface designed specifically for campus life.
                        </p>
                    </div>

                    <div class="d-flex gap-3 flex-wrap">
                        <div class="stats-box">
                            <h3 class="fw-bold mb-0" style="color: #818cf8;">500+</h3>
                            <small class="opacity-75">Active Users</small>
                        </div>
                        <div class="stats-box" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.2);">
                            <h3 class="fw-bold mb-0" style="color: #10b981;">99.9%</h3>
                            <small class="opacity-75">Uptime</small>
                        </div>
                        <div class="stats-box" style="background: rgba(251, 113, 133, 0.1); border-color: rgba(251, 113, 133, 0.2);">
                            <h3 class="fw-bold mb-0" style="color: #fb7185;">24/7</h3>
                            <small class="opacity-75">Support</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="position-relative">
                    <div style="background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(168, 85, 247, 0.1)); border-radius: 24px; padding: 3rem; border: 1px solid rgba(255, 255, 255, 0.1);">
                        <div class="text-center mb-4">
                            <div class="d-inline-block" style="font-size: 8rem; background: linear-gradient(135deg, #818cf8, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                <i class="bi bi-mortarboard-fill"></i>
                            </div>
                        </div>
                        <h5 class="text-center fw-bold mb-3">Trusted by Leading Institutions</h5>
                        <p class="text-center opacity-75 mb-0">
                            Join hundreds of campuses worldwide using CampusConnect to streamline their resource management and enhance student experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section - Enhanced -->
    <div id="contact" class="container py-5 mb-5">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3" style="background: linear-gradient(to right, #fb7185, #c084fc); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Get In Touch
            </h2>
            <p class="lead opacity-75">We'd love to hear from you! Reach out anytime.</p>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Email Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Email Us</h4>
                    <p class="opacity-75 mb-3">Drop us a line anytime!</p>
                    <a href="mailto:support@campusconnect.edu" class="text-decoration-none fw-bold" style="color: #818cf8;">
                        support@campusconnect.edu
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Phone Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card" style="background: rgba(16, 185, 129, 0.1); border-color: rgba(16, 185, 129, 0.3);">
                    <div class="contact-icon" style="background: linear-gradient(135deg, #10b981, #059669);">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Call Us</h4>
                    <p class="opacity-75 mb-3">Mon-Fri, 9AM-6PM</p>
                    <a href="tel:+8801234567890" class="text-decoration-none fw-bold" style="color: #10b981;">
                        +880 1234-567890
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>

            <!-- Location Card -->
            <div class="col-md-6 col-lg-4">
                <div class="contact-card" style="background: rgba(251, 113, 133, 0.1); border-color: rgba(251, 113, 133, 0.3);">
                    <div class="contact-icon" style="background: linear-gradient(135deg, #fb7185, #f43f5e);">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <h4 class="fw-bold mb-3">Visit Us</h4>
                    <p class="opacity-75 mb-3">Come say hello!</p>
                    <p class="fw-bold mb-0" style="color: #fb7185;">
                        Dhaka, Bangladesh
                        <i class="bi bi-arrow-right ms-2"></i>
                    </p>
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="text-center mt-5">
            <h5 class="fw-bold mb-4">Follow Us</h5>
            <div class="d-flex gap-3 justify-content-center">
                <a href="#" class="social-link">
                    <i class="bi bi-facebook"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="bi bi-twitter"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="bi bi-instagram"></i>
                </a>
                <a href="#" class="social-link">
                    <i class="bi bi-linkedin"></i>
                </a>
            </div>
        </div>

        <!-- CTA Box -->
        <div class="mt-5">
            <div class="cta-box">
                <h3 class="fw-bold mb-3">Ready to Transform Your Campus?</h3>
                <p class="mb-4 opacity-90">Join thousands of students and faculty already using CampusConnect</p>
                <a href="<?php echo URLROOT; ?>/auth/login" class="btn btn-light btn-lg rounded-pill px-5 fw-bold" style="color: #4f46e5;">
                    Get Started Free <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script>
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('active');
}

// Smooth scrolling for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Close mobile sidebar after navigation
            document.getElementById('sidebar').classList.remove('active');
        }
    });
});

// Active link highlighting on scroll
window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('div[id]');
    const scrollY = window.pageYOffset + 150;

    sections.forEach(section => {
        const sectionHeight = section.offsetHeight;
        const sectionTop = section.offsetTop;
        const sectionId = section.getAttribute('id');
        
        if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
            document.querySelectorAll('.sidebar-link').forEach(link => {
                link.classList.remove('active');
            });
            const activeLink = document.querySelector(`.sidebar-link[href="#${sectionId}"]`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }
    });
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', function(event) {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.querySelector('.mobile-toggle');
    
    if (window.innerWidth <= 768) {
        if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
            sidebar.classList.remove('active');
        }
    }
});
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
