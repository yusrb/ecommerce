<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @isset($title)
            {{ $title }} | Clocin
        @endisset
    </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</head>
<body class="bg-gray-800 flex">
    <!-- Sidebar -->
    <div class="w-72 bg-gray-800 shadow-lg h-screen">
        <div class="p-5 text-center">
            <div class="flex items-center space-x-1 ml-7">
                <box-icon name='window-alt' color='#706565' size="26px" class=""></box-icon>
                <p class="text-4xl font-bold text-red-500">Clocin</p>
            </div>
            <p class="text-md font-semibold text-white mb-6 mr-7">Elequent Jericho</p>
            <hr class="border-gray-400 mb-6">
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('administrator-home') }}" class="flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-200 group">
                        <box-icon name='home' type='solid' color='#DE4F4F'></box-icon>
                        <span class="ml-3 text-white">Home</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('product-table') }}" class="flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-200 group">
                        <box-icon name='basket' type='solid' color='#DE4F4F'></box-icon>
                        <span class="ml-3 text-white">Produk</span>
                    </a>
                </li>
                <li>
                    <a href="dokumentasi.php" class="flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-200 group">
                        <box-icon name='book' type='solid' color='#DE4F4F'></box-icon>
                        <span class="ml-3 text-white">Dokumentasi</span>
                    </a>
                </li>
                <li>
                    <a href="login_user/login.php" class="flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-200 group">
                        <box-icon name='log-in' type='solid' color='#DE4F4F'></box-icon>
                        <span class="ml-3 text-white">Sign In</span>
                    </a>
                </li>
                <li>
                    <a href="../../lib/logout.php" class="flex items-center p-2 text-gray-800 rounded-lg hover:bg-gray-200 group">
                        <box-icon name='log-out' type='solid' color='#DE4F4F'></box-icon>
                        <span class="ml-3 text-white">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
