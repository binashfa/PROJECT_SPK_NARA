<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center bg-cover bg-center"
    style="background-image: url('/images/image.jpg');">

    <div class="w-[900px] h-[550px] bg-white/10 backdrop-blur-lg rounded-2xl shadow-2xl flex overflow-hidden">

        <!-- LEFT -->
        <div class="w-1/2 p-10 text-white flex flex-col justify-center">
            <h1 class="text-4xl font-bold mb-4">Create Account</h1>

            <p class="text-sm opacity-80 mb-6">
                Daftarkan akun untuk mengakses Sistem LMS + SPK berbasis PROMETHEE
            </p>

            <button class="bg-gradient-to-r from-orange-500 to-red-500 px-4 py-2 rounded-full w-32">
                Learn More
            </button>
        </div>

        <!-- RIGHT -->
        <div class="w-1/2 flex items-center justify-center">
            <div class="w-80 text-white">

                <h2 class="text-center text-2xl font-semibold mb-6">
                    Register
                </h2>

                <form method="POST" action="{{ route('register.process') }}">
                    @csrf

                    <!-- NAME -->
                    <input type="text" name="name" placeholder="Full Name"
                        class="w-full mb-4 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <!-- EMAIL -->
                    <input type="email" name="email" placeholder="Email"
                        class="w-full mb-4 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <!-- PASSWORD -->
                    <input type="password" name="password" placeholder="Password"
                        class="w-full mb-4 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <!-- CONFIRM PASSWORD -->
                    <input type="password" name="password_confirmation" placeholder="Confirm Password"
                        class="w-full mb-5 px-4 py-2 rounded-full text-black outline-none focus:ring-2 focus:ring-purple-400">

                    <!-- BUTTON -->
                    <button
                        class="w-full py-2 rounded-full bg-gradient-to-r from-orange-500 to-red-500 hover:scale-105 transition">
                        Register
                    </button>
                </form>

                <!-- LOGIN -->
                <div class="text-center mt-4">
                    <p class="text-sm text-white/80">
                        Sudah punya akun?
                    </p>

                    <a href="/login"
                        class="text-blue-300 hover:text-blue-400 underline">
                        Login di sini
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