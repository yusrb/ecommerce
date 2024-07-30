<!-- Main Content -->
<div class="flex-1 p-6 bg-gray-300">

    <!-- Salam untuk admin -->
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Dashboard Admin</h2>
        <p class="text-gray-600 text-md">Selamat datang di dashboard admin <br> di mana Anda dapat mengelola semua pesanan dan produk dengan mudah.</p>
    </div>

    <!-- Bagian Daftar Pesanan -->
    <div class="bg-white shadow-md rounded h-screen px-8 pt-6 pb-8 mb-6">
        <h2 class="text-2xl font-bold mb-4 text-gray-800">Daftar Pesanan</h2>
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        ID Pesanan
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nama Pelanggan
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Contoh Pesanan -->
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        001
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        Byrn
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        Belum Lunas
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            View
                        </button>
                    </td>
                </tr>
                <!-- Tambahan data pesanan -->
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        002
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        Jane Doe
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        Lunas
                    </td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            View
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
