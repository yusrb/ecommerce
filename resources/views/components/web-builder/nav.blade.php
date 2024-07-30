<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title)
        {{ $title }} / Clocin
        @else
        Clocin
        @endisset
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="bg-gradient-to-tr from-gray-700 to-gray-600 p-4 pb-2 flex border-b border-gray-300">
        <div class="px-3 py-1 flex items-center space-x-1 border-x border-gray-300">
            <box-icon name='envelope' color="#FF6060" size="18px"></box-icon>
            <p class="text-sm text-white">byrn.uiy@gmail.com</p>
        </div>
        <div class="px-3 py-1 flex items-center space-x-1 border-r border-gray-300">
            <box-icon name='phone' color="#FF6060" size="18px"></box-icon>
            <p class="text-sm text-white">(0274) 566569 / +62818267880</p>
        </div>
        <p class="text-white text-sm ml-auto border-x px-4">Pusat Belanja Audio</p>
    </div>
    {{-- navbar --}}
    <nav class="bg-gradient-to-tr from-gray-700 to-gray-600 p-4 mb-5">
        <ul class="flex items-center mx-[120px] space-x-32">
            <li>
                <a href="/" class="flex items-center">
                    <box-icon name='window-alt' type='solid' color='#ffffff' size="md"></box-icon>
                    <p class="text-white text-xl font-bold ml-2">Clocin</p>
                </a>
            </li>
            <li class="flex items-center space-x-4">
                <form action="{{ route('search_all') }}" method="get" class="flex items-center">
                    <div class="relative">
                        <box-icon name='search-alt-2' size="20px" color="#C9C0C0" class="absolute left-6 top-2.5"></box-icon>
                        <input type="search" name="search"
                            class="rounded-lg w-96 p-2 pl-10 ml-[10px] border border-gray-700 focus:border-red-500 focus:ring-1 focus:ring-red-500"
                            placeholder="Search for anything...">
                    </div>
                    <select name="product_type" id="product_type"
                        class="rounded-lg border border-gray-300 focus:border-red-500 focus:ring-1 focus:ring-red-500 text-sm p-2 ml-2">
                        <option value="all_categories">All Categories</option>
                        <option value="In_Ear_Monitor">IEM</option>
                        <option value="Eartips">Eartips</option>
                        <option value="Cable">Cable</option>
                        <option value="Box">Dac</option>
                    </select>
                </form>
            </li>
            <li class="flex space-x-2">
                <a href="{{ route('cart') }}">
                    <box-icon name='cart' color='#ffffff'></box-icon>
                </a>
                <a href="{{ route('wishlist') }}">
                    <box-icon name='heart' color="#ffffff"></box-icon>
                </a>
                @auth
                    <a href="{{ route('user-profile' , Auth()->user()->user_id ) }}">
                        <box-icon name='user' color='#ffffff'></box-icon>
                    </a>
                @else
                    <a href="{{ route('login') }}">
                        <box-icon name='user' color='#ffffff'></box-icon>
                    </a>
                @endauth
            </li>
        </ul>
    </nav>

