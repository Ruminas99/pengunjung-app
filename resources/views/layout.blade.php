<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>BUTET</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @stack('styles')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0c0a18;
            /* Warna dasar jika gradien tidak didukung */
            overflow-x: hidden;
        }

        /* Latar Belakang Gradien Jala (Mesh Gradient) yang Bergerak */
        .animated-gradient-bg {
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            background:
                radial-gradient(at 30% 70%, hsla(210, 100%, 60%, 0.45) 0px, transparent 60%),
                radial-gradient(at 70% 30%, hsla(200, 100%, 70%, 0.4) 0px, transparent 60%),
                radial-gradient(at 50% 50%, hsla(220, 100%, 55%, 0.3) 0px, transparent 70%),
                radial-gradient(at 80% 80%, hsla(195, 100%, 65%, 0.2) 0px, transparent 60%);
            background-size: 200% 200%;
            animation: gradient-move 25s ease infinite;
        }

        @keyframes gradient-move {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }


        /* Animasi kustom */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes popIn {
            from {
                opacity: 0;
                transform: scale(0.95) translateY(10px);
            }

            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-out forwards;
        }

        .animate-pop-in {
            animation: popIn 0.8s ease-out forwards;
            opacity: 0;
        }

        .stagger-1 {
            animation-delay: 0.4s;
        }

        .stagger-2 {
            animation-delay: 0.5s;
        }

        .stagger-3 {
            animation-delay: 0.6s;
        }

        .stagger-4 {
            animation-delay: 0.7s;
        }

        /* Efek Kilau Interaktif pada Kartu */
        .interactive-card {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .interactive-card::before {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 0.75rem;
            /* Sesuai dengan rounded-xl */
            padding: 1px;
            background: radial-gradient(400px circle at var(--mouse-x) var(--mouse-y), rgba(96, 165, 250, 0.4), transparent 80%);
            -webkit-mask:
                linear-gradient(#fff 0 0) content-box,
                linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .interactive-card:hover::before {
            opacity: 1;
        }

        @keyframes gradient-move {

            0%,
            100% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 100%;
            }
        }

        /* Animasi kustom */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Efek Kartu Kaca Interaktif */
        .glass-card {
            background: linear-gradient(135deg, rgba(30, 60, 120, 0.25), rgba(255, 255, 255, 0.05));
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 1rem;
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            border-color: rgba(255, 255, 255, 0.25);
            transform: translateY(-4px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.25);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-900 to-slate-900 text-gray-100">
    <nav class="absolute top-0 left-0 right-0 z-10 p-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-center h-16">
                <!-- Wadah Tombol dengan Efek Kaca Buram (Frosted Glass) -->
                <div
                    class="flex items-baseline space-x-2 bg-black/20 backdrop-blur-sm border border-white/10 shadow-lg rounded-full p-2">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link px-4 py-2 rounded-full text-sm font-medium transition duration-200"
                        :class="window.location.href.includes('dashboard') ? 'bg-white text-gray-800' : 'text-white hover:bg-white/20'">Beranda</a>
                </div>
            </div>
        </div>
    </nav>
    <main id="main-content">
        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const navLinks = document.querySelectorAll('.nav-link');
            const currentURL = window.location.href;
            const mainContent = document.getElementById('main-content');

            navLinks.forEach(link => {
                const linkURL = link.getAttribute('href');
                if (currentURL === linkURL) {
                    link.classList.add('bg-white', 'text-gray-800');
                    link.classList.remove('text-white');
                } else {
                    link.classList.add('text-white', 'hover:bg-white/20');
                }

                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const destination = this.href;

                    if (destination === window.location.href || destination.endsWith('#')) {
                        return;
                    }

                    mainContent.classList.add('page-exit-animation');
                    setTimeout(() => {
                        window.location.href = destination;
                    }, 500);
                });
            });
        });
    </script>
    @stack('scripts')
</body>

</html>