 <!-- Main Content -->
 <div class="flex-1 p-6 bg-gray-300">

     <!-- Salam untuk admin -->
     <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-6">
         <h2 class="text-2xl font-bold mb-4 text-gray-800">Dashboard Admin</h2>
         <p class="text-gray-600 text-md">Selamat datang di dashboard admin <br> di mana Anda dapat mengelola semua
             produk dengan mudah.</p>
     </div>

     <div class="container mx-auto px-4">
         <div class="flex items-center justify-between">
             <h1 class="text-xl font-bold my-4">Daftar Produk</h1>
             <a href="{{ route('product-add') }}">
                 <button class="bg-red-500 text-white px-4 py-2 my-3 mb-4 rounded-md">
                     Create
                 </button>
             </a>
         </div>
         <table class="min-w-full leading-normal">
             <thead>
                 <tr>
                     <th
                         class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                         ID Produk
                     </th>
                     <th
                         class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                         Nama
                     </th>
                     <th
                         class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                         Deskripsi
                     </th>
                     <th
                         class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                         Harga
                     </th>
                     <th
                         class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                         Aksi
                     </th>
                 </tr>
             </thead>
             <tbody>
                @php
                    $no = 1;
                @endphp
                 @foreach ($product as $item)
                 <tr>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
                        {{ $no }}
                     </td>
                     @php
                         $no++;
                     @endphp
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                         {{ $item->name }}
                     </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        @php
                        $deskripsi = $item->deskripsi;

                        $panjang_deskripsi = 50;
                        $deskripsi_terpotong = substr($deskripsi, 0, $panjang_deskripsi);

                        if (strlen($deskripsi) > $panjang_deskripsi) {
                        $deskripsi_terpotong .= '...';
                        }

                        echo $deskripsi_terpotong;
                        @endphp
                     </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                         {{ $item->harga }}
                     </td>
                     <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm flex space-x-2">
                         <a href="{{ route('product-edit', $item->product_id) }}">
                             <button class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                 Update
                             </button>
                         </a>
                         <form action="{{ route('product-destroy', $item->product_id) }}" method="POST"
                             onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                             @csrf
                             @method('DELETE')
                             <button type="submit"
                                 class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                 Delete
                             </button>
                         </form>
                         <a href="">
                             <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                 View
                             </button>
                         </a>
                     </td>
                 </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
