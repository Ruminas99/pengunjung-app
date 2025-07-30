<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BUTET</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
    </style>
  </head>
<body class="bg-gradient-to-r from-indigo-500 to-teal-400 min-h-screen">
    @include('navbar')
    @yield('content')

</body>
</html>