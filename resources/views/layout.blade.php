<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BUTET</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @stack('styles')
    <style>
        .animate-fade {
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .input-field {
            @apply w-full px-4 py-2 border border-gray-300 rounded-lg transition duration-300 transform focus:outline-none focus:ring-2 focus:ring-blue-500 focus:scale-105 animate__animated animate__fadeInUp;
        }

        .submit-btn {
            @apply w-full bg-blue-600 text-white font-semibold py-2 rounded-lg hover:bg-blue-700 transition duration-300 transform hover:scale-105 active:scale-95;
        }
        @keyframes pageEnter {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes pageExit {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }

        /* Class untuk memicu animasi keluar */
        .page-exit-animation {
            animation: pageExit 0.5s ease-in-out forwards;
        }
    </style>
  </head>
<body class="bg-gradient-to-r from-indigo-500 to-teal-400 min-h-screen">
    <nav class="absolute top-0 left-0 right-0 z-10 p-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-center h-16">
                <!-- Wadah Tombol dengan Efek Kaca Buram (Frosted Glass) -->
                <div class="flex items-baseline space-x-2 bg-black/20 backdrop-blur-sm border border-white/10 shadow-lg rounded-full p-2">
                    <a href="{{ route('dashboard') }}" class="nav-link px-4 py-2 rounded-full text-sm font-medium transition duration-200" :class="window.location.href.includes('dashboard') ? 'bg-white text-gray-800' : 'text-white hover:bg-white/20'">Beranda</a>
                    <a href="{{ route('laporan') }}" class="nav-link px-4 py-2 rounded-full text-sm font-medium transition duration-200" :class="window.location.href.includes('laporan') ? 'bg-white text-gray-800' : 'text-white hover:bg-white/20'">Laporan</a>
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

                link.addEventListener('click', function(event) {
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
</body>
</html>