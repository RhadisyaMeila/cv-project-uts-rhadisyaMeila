<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - {{ $title ?? 'Rhadisya Meila' }}</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom Pastel Theme -->
    <style>
        :root {
            --pastel-pink: #ffd6e0;
            --pastel-purple: #e2d1f9;
            --pastel-blue: #d1e9ff;
            --pastel-yellow: #fff2d1;
            --pastel-green: #d1f7e2;
            --pastel-lavender: #f0e6ff;
            --soft-white: #fefefe;
            --text-dark: #4a4a4a;
            --text-light: #888;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #f0e6ff 100%);
            min-height: 100vh;
        }

        /* ===== NAVIGATION ===== */
        .navbar {
            background: linear-gradient(135deg, var(--pastel-purple) 0%, var(--pastel-blue) 100%) !important;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--text-dark) !important;
        }

        .navbar-nav .nav-link {
            color: var(--text-dark) !important;
            font-weight: 500;
            margin: 0 0.5rem;
            padding: 0.5rem 1rem !important;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
            color: #6d28d9 !important;
        }

        /* ===== PROFILE SECTION ===== */
        .profile-img {
            width: 220px;
            height: 220px;
            object-fit: cover;
            border: 6px solid var(--pastel-blue);
            border-radius: 50%;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            transition: all 0.5s ease;
        }

        .profile-img:hover {
            transform: scale(1.05) rotate(2deg);
            border-color: var(--pastel-purple);
            box-shadow: 0 12px 40px rgba(0,0,0,0.2);
        }

        .profile-img-placeholder {
            width: 220px;
            height: 220px;
            border: 6px solid var(--pastel-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--soft-white);
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
        }

        /* ===== CARDS ===== */
        .pastel-card {
            border: none;
            border-radius: 20px;
            background: var(--soft-white);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            overflow: hidden;
        }

        .pastel-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .pastel-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--pastel-pink), var(--pastel-purple), var(--pastel-blue));
        }

        .card {
            border: none;
            border-radius: 16px;
            background: var(--soft-white);
            box-shadow: 0 6px 25px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0,0,0,0.1);
        }

        /* ===== SECTIONS ===== */
        .section-title {
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 3px solid transparent;
            background: linear-gradient(90deg, var(--pastel-purple), var(--pastel-blue)) border-box;
            -webkit-background-clip: text;
            /*-webkit-text-fill-color: transparent;*/
            background-clip: text;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--pastel-purple), var(--pastel-blue));
            border-radius: 2px;
        }

        /* ===== BUTTONS ===== */
        .btn-pastel-blue {
            background: linear-gradient(135deg, var(--pastel-blue), #a8d4ff);
            border: none;
            color: var(--text-dark);
            padding: 10px 24px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(168, 212, 255, 0.4);
        }

        .btn-pastel-blue:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(168, 212, 255, 0.6);
            color: var(--text-dark);
        }

        .btn-outline-primary {
            border: 2px solid var(--pastel-blue);
            color: var(--pastel-blue);
            background: transparent;
            border-radius: 12px;
            padding: 8px 20px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-outline-primary:hover {
            background: var(--pastel-blue);
            color: var(--text-dark);
            transform: translateY(-2px);
        }

        /* Simple fix untuk readability */
        .card.bg-pastel-blue .section-title,
        .card.bg-pastel-blue .lead {
            color: #2d3748 !important;
            text-shadow: 0 1px 2px rgba(255,255,255,0.8);
        }

        .btn-outline-primary {
            color: #4a5568 !important;
            border-color: #4a5568 !important;
            font-weight: 600;
        }

        .btn-outline-primary:hover {
            background: #4a5568 !important;
            color: white !important;
        }


        /* ===== SKILLS ===== */
        .skill-item {
            background: var(--soft-white);
            border: 2px solid transparent;
            border-radius: 16px;
            padding: 1.25rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            position: relative;
            overflow: hidden;
        }

        .skill-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s ease;
        }

        .skill-item:hover::before {
            left: 100%;
        }

        .skill-item:hover {
            transform: translateY(-5px);
            border-color: var(--pastel-blue);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .skill-bar {
            height: 10px;
            background: #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            margin: 12px 0 8px 0;
            box-shadow: inset 0 2px 4px rgba(0,0,0,0.1);
        }

        .skill-progress {
            height: 100%;
            border-radius: 10px;
            transition: width 0.8s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }

        /* ===== BADGES ===== */
        .badge {
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        /* ===== STATS CARDS ===== */
        .stat-card {
            border-radius: 20px;
            border: none;
            color: white;
            transition: all 0.4s ease;
            overflow: hidden;
            position: relative;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.1) 0%, transparent 100%);
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .bg-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; }
        .bg-success { background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important; }
        .bg-info { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important; }
        .bg-warning { background: linear-gradient(135deg, #fa709a 0%, #fee140 100%) !important; }

        /* ===== SOCIAL LINKS ===== */
        .social-links .btn {
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            margin: 0.25rem;
        }

        .social-links .btn:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }

        /* ===== CONTACT INFO ===== */
        .contact-info p {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            color: var(--text-dark);
            font-weight: 500;
        }

        .contact-info i {
            width: 20px;
            margin-right: 10px;
            color: var(--text-dark);
        }

        /* ===== FOOTER ===== */
        footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            margin-top: 4rem;
            padding: 2rem 0;
        }

        /* ===== ANIMATIONS ===== */
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

        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .profile-img, .profile-img-placeholder {
                width: 180px;
                height: 180px;
            }
            
            .pastel-card, .card {
                border-radius: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-star me-2"></i>Rhadisya Meila
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pendidikan">Pendidikan</a></li>
                    <li class="nav-item"><a class="nav-link" href="/pengalaman">Pengalaman</a></li>
                    <li class="nav-item"><a class="nav-link" href="/keahlian">Keahlian</a></li>
                    <li class="nav-item"><a class="nav-link" href="/sertifikasi">Sertifikasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="/portofolio">Portofolio</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5 fade-in">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2025 Rhadisya Meila Parmanti. All rights reserved.</p>
            <p class="mt-2 opacity-75">Crafted with ❤️ using Laravel & Bootstrap</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Add smooth scrolling and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // Add staggered animation to cards
            const cards = document.querySelectorAll('.card, .pastel-card, .skill-item');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    card.style.transition = 'all 0.6s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</body>
</html>