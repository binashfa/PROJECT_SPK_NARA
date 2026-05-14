
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<div class="bg-white p-6 rounded shadow w-96">
    <h2 class="text-xl font-bold mb-4 text-center">Request Akun</h2>

    @if(session('success'))
        <div class="text-green-500 mb-3 text-center">{{ session('success') }}</div>
    @endif

    <form method="POST" action="/request-akun">
        @csrf

        <input type="text" name="nama" placeholder="Nama"
            class="w-full mb-2 p-2 border rounded">

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-2 p-2 border rounded">

        <select name="role" class="w-full mb-3 p-2 border rounded">
            <option value="siswa">Siswa</option>
            <option value="guru">Guru</option>
        </select>

        <button class="w-full bg-blue-500 text-white p-2 rounded">
            Kirim Request
        </button>
    </form>
</div>

</body>
</html>