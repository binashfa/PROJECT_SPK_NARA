<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image: url('/images/image.jpg');">

    <div class="w-[900px] h-[500px] bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl flex overflow-hidden">

        <!-- LEFT -->
        <div class="w-1/2 p-10 text-white flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">Welcome!</h1>
            <p class="text-sm opacity-80 mb-6">
                Sistem LMS + SPK berbasis PROMETHEE
            </p>
            <button class="bg-gradient-to-r from-orange-500 to-red-500 px-4 py-2 rounded-full w-32">
                Learn More
            </button>
        </div>

        <!-- RIGHT -->
        <div class="w-1/2 flex items-center justify-center">
            <div class="w-80 text-white">

                <h2 class="text-center text-2xl font-semibold mb-6">Sign in</h2>

                <form method="POST" action="{{ route('login.process') }}">
                    @csrf

                    <input type="email" name="email" placeholder="Email"
                        class="w-full mb-4 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <input type="password" name="password" placeholder="Password"
                        class="w-full mb-4 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <button class="w-full py-2 rounded-full bg-gradient-to-r from-orange-500 to-red-500 hover:scale-105 transition">
                        Submit
                    </button>
                </form>

                <!-- 🔥 TAMBAH INI -->
                <div class="text-center mt-4">
                    <p class="text-sm text-white/80">Belum punya akun?</p>

                    <a href="/request-akun"
                        class="text-blue-300 hover:text-blue-400 underline">
                        Minta Akun ke Admin
                    </a>
                </div>

                <!-- ERROR -->
                @if ($errors->any())
                <div class="text-red-300 mt-3 text-sm text-center">
                    {{ $errors->first() }}
                </div>
                @endif

            </div>
        </div>

    </div>

</body>

</html>