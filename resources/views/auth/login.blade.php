<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen flex items-center justify-center 
             bg-gradient-to-br from-[#105666] via-[#839958] to-[#0d4b59] relative overflow-hidden">

    <!-- BACKGROUND GLOW -->
    <div class="absolute w-[500px] h-[500px] bg-[#839958]/20 blur-3xl rounded-full -top-32 -left-32"></div>
    <div class="absolute w-[400px] h-[400px] bg-[#D3968C]/10 blur-3xl rounded-full bottom-0 right-0"></div>

    <!-- WRAPPER -->
    <div class="flex items-center shadow-2xl relative z-10">

        <!-- ================= LEFT ================= -->
        <div class="w-[420px] h-[520px] 
                    bg-white/10 backdrop-blur-xl 
                    rounded-l-[32px] rounded-r-none
                    border border-white/20 border-r-0
                    p-10 flex flex-col justify-center text-white">

            <h1 class="text-4xl font-bold mb-2 tracking-tight">
                Sign In
            </h1>

            <p class="text-sm text-white/70 mb-10">
                Masuk untuk melanjutkan aktivitasmu
            </p>

            <form method="POST" action="{{ route('login.process') }}" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div class="relative">
                    <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-white/50"></i>
                    <input type="email" name="email" placeholder="Email"
                        class="w-full pl-11 pr-4 py-3 rounded-xl
                               bg-white/10 border border-white/20 
                               text-white placeholder-white/50
                               focus:outline-none focus:ring-2 focus:ring-[#F7F4D5]/40
                               focus:bg-white/20 transition-all duration-300">
                </div>

                <!-- PASSWORD -->
                <div class="relative">
                    <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-white/50"></i>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full pl-11 pr-4 py-3 rounded-xl
                               bg-white/10 border border-white/20 
                               text-white placeholder-white/50
                               focus:outline-none focus:ring-2 focus:ring-[#F7F4D5]/40
                               focus:bg-white/20 transition-all duration-300">
                </div>

                <!-- BUTTON -->
                <button
                    class="w-full py-3 rounded-xl font-semibold
                           bg-gradient-to-r from-[#105666] to-[#0d4b59]
                           hover:from-[#0d4b59] hover:to-[#105666]
                           transition-all duration-300
                           hover:-translate-y-[2px] hover:shadow-xl
                           active:scale-[0.97]">

                    Masuk

                </button>

            </form>

            <!-- LINK -->
            <div class="mt-8 text-center">
                <p class="text-sm text-white/70">
                    Belum punya akun?
                </p>

                <a href="/request-akun"
                    class="text-[#F7F4D5] hover:text-white underline transition">
                    Minta Akun ke Admin
                </a>
            </div>

            <!-- ERROR -->
            @if ($errors->any())
            <div class="text-[#ffdada] mt-4 text-sm text-center">
                {{ $errors->first() }}
            </div>
            @endif

        </div>

        <!-- DIVIDER HALUS -->
        <div class="w-[1px] h-[70%] bg-white/20"></div>

        <!-- ================= RIGHT ================= -->
        <div class="w-[520px] h-[520px] 
                    bg-gradient-to-br from-[#0d4b59] to-[#105666] 
                    rounded-r-[32px] rounded-l-none
                    flex items-center justify-center
                    relative overflow-hidden">

            <!-- GLOW -->
            <div class="absolute w-[300px] h-[300px] 
                        bg-[#839958]/20 blur-3xl rounded-full"></div>

            <!-- IMAGE -->
            <div class="relative group">

                <!-- HOVER GLOW -->
                <div class="absolute inset-0 bg-[#105666]/40 blur-2xl rounded-3xl 
                            opacity-0 group-hover:opacity-100 
                            transition duration-500"></div>

                <img src="/images/login.png"
                    class="relative z-10 max-h-[420px] object-contain
                           transition-all duration-500
                           group-hover:scale-105
                           group-hover:rotate-1
                           group-hover:drop-shadow-[0_0_40px_rgba(16,86,102,0.7)]">

            </div>

        </div>

    </div>

</body>

</html>