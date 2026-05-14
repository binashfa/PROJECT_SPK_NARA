<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Guru</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="flex">

        <!-- SIDEBAR -->
        @include('guru.sidebar')

        <!-- MAIN -->
        <div class="flex-1 p-6">

            <h1 class="text-3xl font-bold mb-5">
                Dashboard guru
            </h1>

            <div class="bg-white p-5 rounded shadow">
                Halo guru 👑
            </div>

        </div>

    </div>

</body>

</html>