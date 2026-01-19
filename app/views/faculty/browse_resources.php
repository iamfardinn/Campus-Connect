<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        color: #f8fafc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Sidebar */
    .faculty-sidebar {
        position: fixed;
        left: 0;
        top: 0;
        height: 100vh;
        width: 280px;
        background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
        border-right: 1px solid rgba(255, 255, 255, 0.1);
        padding: 2rem 0;
        z-index: 1000;
        overflow-y: auto;
        box-shadow: 5px 0 30px rgba(0, 0, 0, 0.5);
    }

    .sidebar-brand {
        padding: 0 1.5rem;
        margin-bottom: 2rem;
        text-align: center;
    }

    .sidebar-brand h2 {
        font-size: 1.5rem;
        font-weight: 900;
        background: linear-gradient(135deg, #10b981, #059669);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sidebar-brand p {
        font-size: 0.75rem;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sidebar-nav {
        list-style: none;
        padding: 0;
    }

    .nav-item {
        margin-bottom: 0.25rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 1rem 1.5rem;
        color: #94a3b8;
        text-decoration: none;
        transition: all 0.3s;
        font-weight: 600;
    }

    .nav-link:hover {
        background: rgba(16, 185, 129, 0.1);
        color: #10b981;
    }

    .nav-link.active {
        background: linear-gradient(90deg, rgba(16, 185, 129, 0.2), transparent);
        color: #10b981;
        border-left: 4px solid #10b981;
    }

    .nav-link i {
        width: 28px;
        margin-right: 1rem;
        font-size: 1.25rem;
    }

    .sidebar-divider {
        height: 1px;
        background: rgba(255, 255, 255, 0.1);
        margin: 1.5rem 1.5rem;
    }

    /* Main Content */
    .main-content {
        margin-left: 280px;
        padding: 2rem;
        min-height: 100vh;
    }

    /* Page Header */
    .page-header {
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.9), rgba(5, 150, 105, 0.9));
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 2.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .page-header h1 {
        font-size: 2rem;
        font-weight: 900;
        color: white;
        margin-bottom: 0.5rem;
    }

    .page-header p {
        color: rgba(255, 255, 255, 0.8);
        margin: 0;
    }

    /* Tab Navigation */
    .tab-nav {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .tab-btn {
        padding: 1rem 2rem;
        background: rgba(255, 255, 255, 0.05);
        border: 2px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .tab-btn.active,
    .tab-btn:hover {
        background: linear-gradient(135deg, #10b981, #059669);
        border-color: transparent;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    /* Cards Grid */
    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 2rem;
    }

    /* Opportunity Card */
    .opportunity-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s;
        display: flex;
        flex-direction: column;
    }

    .opportunity-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        border-color: rgba(16, 185, 129, 0.5);
    }

    /* Card Header with Categories */
    .card-category {
        padding: 1rem 1.5rem;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .category-conference {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
    }

    .category-icpc {
        background: linear-gradient(135deg, #f59e0b, #d97706);
    }

    .category-phd {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .category-research {
        background: linear-gradient(135deg, #ef4444, #dc2626);
    }

    .deadline-badge {
        background: rgba(255, 255, 255, 0.2);
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.7rem;
    }

    /* Card Body */
    .card-body {
        padding: 1.5rem;
        flex: 1;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: 800;
        color: white;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .card-description {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.5rem;
    }

    .card-meta {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .meta-item i {
        width: 20px;
        color: #10b981;
    }

    .card-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .tag {
        padding: 0.375rem 0.875rem;
        background: rgba(16, 185, 129, 0.2);
        border: 1px solid rgba(16, 185, 129, 0.3);
        border-radius: 20px;
        font-size: 0.75rem;
        color: #10b981;
        font-weight: 600;
    }

    /* Card Footer */
    .card-footer {
        padding: 1rem 1.5rem;
        background: rgba(0, 0, 0, 0.2);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        gap: 0.75rem;
    }

    .btn {
        flex: 1;
        padding: 0.875rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 0.875rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
        color: white;
    }

    .btn-outline {
        background: transparent;
        border: 2px solid rgba(255, 255, 255, 0.2);
        color: white;
    }

    .btn-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: #10b981;
        color: white;
    }

    /* Featured Badge */
    .featured-badge {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Stats Section */
    .stats-section {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .stat-info h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: white;
        margin: 0;
    }

    .stat-info p {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .faculty-sidebar {
            transform: translateX(-100%);
        }

        .main-content {
            margin-left: 0;
        }

        .cards-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- Sidebar -->
<aside class="faculty-sidebar">
    <div class="sidebar-brand">
        <h2>🎓 Faculty Panel</h2>
        <p>Campus Connect</p>
    </div>

    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/faculty/index" class="nav-link">
                <i class="bi bi-grid-fill"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/faculty/browse_resources" class="nav-link active">
                <i class="bi bi-compass-fill"></i>
                <span>Browse Opportunities</span>
            </a>
        </li>
        
       
    </ul>

    <div class="sidebar-divider"></div>

    <ul class="sidebar-nav">
        <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/users/logout" class="nav-link">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content">
    <!-- Page Header -->
    <div class="page-header">
        <h1>🌟 Academic Opportunities & Resources</h1>
        <p>Discover conferences, competitions, PhD programs, and research opportunities</p>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-calendar-event"></i>
            </div>
            <div class="stat-info">
                <h3>12</h3>
                <p>Conferences</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-trophy"></i>
            </div>
            <div class="stat-info">
                <h3>8</h3>
                <p>Competitions</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-mortarboard"></i>
            </div>
            <div class="stat-info">
                <h3>15</h3>
                <p>PhD Programs</p>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="bi bi-file-earmark-text"></i>
            </div>
            <div class="stat-info">
                <h3>6</h3>
                <p>Research Grants</p>
            </div>
        </div>
    </div>

    <!-- Tab Navigation -->
    <div class="tab-nav">
        <button class="tab-btn active" onclick="filterCards('all')">
            <i class="bi bi-grid-fill"></i> All Opportunities
        </button>
        <button class="tab-btn" onclick="filterCards('conference')">
            <i class="bi bi-megaphone"></i> Conferences
        </button>
        <button class="tab-btn" onclick="filterCards('icpc')">
            <i class="bi bi-trophy"></i> ICPC/Competitions
        </button>
        <button class="tab-btn" onclick="filterCards('phd')">
            <i class="bi bi-mortarboard"></i> PhD Programs
        </button>
        <button class="tab-btn" onclick="filterCards('research')">
            <i class="bi bi-file-earmark-text"></i> Research
        </button>
    </div>

    <!-- Cards Grid -->
    <div class="cards-grid">
        <!-- Conference Card 1 -->
        <div class="opportunity-card" data-category="conference">
            <div class="card-category category-conference">
                <span><i class="bi bi-megaphone"></i> Conference</span>
                <span class="deadline-badge">Deadline: Mar 15</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">International Conference on Artificial Intelligence 2026</h3>
                <p class="card-description">
                    Join leading AI researchers and practitioners for groundbreaking presentations on machine learning, deep learning, and AI ethics.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Singapore</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>June 15-18, 2026</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-currency-dollar"></i>
                        <span>$800 Registration</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">AI</span>
                    <span class="tag">Machine Learning</span>
                    <span class="tag">Research</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-link-45deg"></i> Visit Website
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-bookmark"></i> Save
                </a>
            </div>
        </div>

        <!-- ICPC Card -->
        <div class="opportunity-card" data-category="icpc">
            <div class="card-category category-icpc">
                <span><i class="bi bi-trophy-fill"></i> Competition</span>
                <span class="deadline-badge">Registration Open</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">ICPC Asia West Regional Contest 2026</h3>
                <p class="card-description">
                    The premier competitive programming contest for university students. Test your algorithmic skills against the best teams in Asia.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Dhaka, Bangladesh</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>November 10, 2026</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-people-fill"></i>
                        <span>Teams of 3 students</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">Algorithms</span>
                    <span class="tag">Programming</span>
                    <span class="tag">Team Event</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Register Team
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-info-circle"></i> Details
                </a>
            </div>
        </div>

        <!-- PhD Opportunity Card -->
        <div class="opportunity-card" data-category="phd">
            <div class="card-category category-phd">
                <span><i class="bi bi-mortarboard-fill"></i> PhD Position</span>
                <span class="deadline-badge">Apply by Apr 30</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">Fully Funded PhD in Computer Science - MIT</h3>
                <p class="card-description">
                    Seeking motivated candidates for doctoral research in distributed systems, cloud computing, and cybersecurity. Full tuition waiver + stipend.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Cambridge, MA, USA</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>Start: Fall 2026</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span>$45,000/year stipend</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">Fully Funded</span>
                    <span class="tag">Systems</span>
                    <span class="tag">Security</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-send"></i> Apply Now
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-file-text"></i> Requirements
                </a>
            </div>
        </div>

        <!-- Research Grant Card -->
        <div class="opportunity-card" data-category="research">
            <div class="card-category category-research">
                <span><i class="bi bi-file-earmark-text-fill"></i> Research Grant</span>
                <span class="deadline-badge">Due: Feb 28</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">NSF Research Grant: AI for Healthcare</h3>
                <p class="card-description">
                    National Science Foundation funding opportunity for innovative AI applications in medical diagnosis, drug discovery, and patient care.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>USA (Any Institution)</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>Duration: 3 years</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span>Up to $500,000</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">AI</span>
                    <span class="tag">Healthcare</span>
                    <span class="tag">Funding</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-file-earmark-arrow-down"></i> Download RFP
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-question-circle"></i> FAQs
                </a>
            </div>
        </div>

        <!-- Conference Card 2 -->
        <div class="opportunity-card" data-category="conference">
            <div class="card-category category-conference">
                <span><i class="bi bi-megaphone"></i> Conference</span>
                <span class="deadline-badge">Early Bird: Feb 20</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">IEEE International Conference on Robotics 2026</h3>
                <p class="card-description">
                    Premier venue for robotics researchers to present cutting-edge work in autonomous systems, human-robot interaction, and robotic learning.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Tokyo, Japan</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>August 5-9, 2026</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-currency-dollar"></i>
                        <span>$650 Registration</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">Robotics</span>
                    <span class="tag">Automation</span>
                    <span class="tag">IEEE</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-link-45deg"></i> Conference Site
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-bookmark"></i> Save
                </a>
            </div>
        </div>

        <!-- ICPC/Competition Card 2 -->
        <div class="opportunity-card" data-category="icpc">
            <div class="card-category category-icpc">
                <span><i class="bi bi-trophy-fill"></i> Hackathon</span>
                <span class="deadline-badge">Live Event</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">Google Code Jam 2026</h3>
                <p class="card-description">
                    Annual coding competition hosted by Google. Solve algorithmic challenges to advance through qualification rounds to the world finals.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Online + Finals in USA</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>March - August 2026</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span>$15,000 grand prize</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">Algorithms</span>
                    <span class="tag">Google</span>
                    <span class="tag">Prize Money</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-person-plus"></i> Register
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-journal-code"></i> Past Problems
                </a>
            </div>
        </div>

        <!-- PhD Card 2 -->
        <div class="opportunity-card" data-category="phd">
            <div class="card-category category-phd">
                <span><i class="bi bi-mortarboard-fill"></i> PhD Fellowship</span>
                <span class="deadline-badge">Rolling Admissions</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">Max Planck PhD Fellowship - Machine Learning</h3>
                <p class="card-description">
                    Join world-renowned research institute in Germany. Focus on deep learning theory, optimization, and generative models.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>Tübingen, Germany</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>Start: Flexible</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span>€52,000/year + benefits</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">ML Theory</span>
                    <span class="tag">Europe</span>
                    <span class="tag">Top Institute</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-envelope"></i> Express Interest
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-people"></i> Faculty
                </a>
            </div>
        </div>

        <!-- Research Grant 2 -->
        <div class="opportunity-card" data-category="research">
            <div class="card-category category-research">
                <span><i class="bi bi-file-earmark-text-fill"></i> Collaboration</span>
                <span class="deadline-badge">Open Call</span>
            </div>
            <div class="card-body">
                <h3 class="card-title">EU Horizon Research Program - Climate AI</h3>
                <p class="card-description">
                    European Union funding for international research collaborations using AI to combat climate change and environmental challenges.
                </p>
                <div class="card-meta">
                    <div class="meta-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>EU Member States</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-calendar-check"></i>
                        <span>Duration: 4 years</span>
                    </div>
                    <div class="meta-item">
                        <i class="bi bi-cash-stack"></i>
                        <span>€2-5 million</span>
                    </div>
                </div>
                <div class="card-tags">
                    <span class="tag">Climate</span>
                    <span class="tag">AI</span>
                    <span class="tag">EU Funding</span>
                </div>
            </div>
            <div class="card-footer">
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right"></i> Apply
                </a>
                <a href="#" class="btn btn-outline">
                    <i class="bi bi-people"></i> Find Partners
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function filterCards(category) {
        const cards = document.querySelectorAll('.opportunity-card');
        const buttons = document.querySelectorAll('.tab-btn');
        
        // Update active button
        buttons.forEach(btn => btn.classList.remove('active'));
        event.target.closest('.tab-btn').classList.add('active');
        
        // Filter cards
        cards.forEach(card => {
            if (category === 'all' || card.getAttribute('data-category') === category) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
