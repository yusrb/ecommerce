<div class="flex justify-center items-start space-x-8 p-8 bg-gray-100 min-h-screen">
    <!-- Foto -->
    <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
        <div class="text-center mb-6">
            <img src="{{ asset('storage/' . ($user->fp ?? 'fotoprofil/default.png')) }}" alt="Avatar"
                class="w-24 h-24 rounded-full mx-auto">
            <h2 class="text-xl font-semibold mt-4">
                {{ $user->nama ?? 'Masukkan Nama Anda' }}
            </h2>
            <p class="text-gray-600"><span>@</span>{{ $user->username }}</p>
            <!-- Form untuk mengunggah foto baru -->
            <form action="{{ route('user-update', $user->user_id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <!-- Tombol untuk memicu input file -->
                <input type="file" id="foto" name="fp" style="display:none;">
                <button type="button" onclick="document.getElementById('foto').click()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg">Unggah Foto Baru</button>
                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg">Simpan Foto</button>
            </form>
            <p class="text-gray-500 text-[13px] mt-2">Unggah avatar baru. foto yang lebih besar akan diubah ukurannya
                secara otomatis. Ukuran unggahan maksimum adalah 1 MB</p>
            @php
            $namabulan = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
            ];

            $tanggal = $user->created_at->format('d F Y');
            $bulanInggris = $user->created_at->format('F');
            $tanggalIndonesia = str_replace($bulanInggris, $namabulan[$bulanInggris], $tanggal);
            @endphp

            <p class="text-gray-500 text-sm mt-2">Anggota Sejak: {{ $tanggalIndonesia }}</p>
            <form action="{{ route('profile.logout', $user->user_id) }}" method="post">
                @csrf
                <button class="mx-auto relative top-10 text-[16px] hover:underline text-red-500">Logout</button>
            </form>
            <a href="/" class="mx-auto relative top-20 text-[16px] hover:underline text-red-500">Lanjutkan Belanja</a>
        </div>
    </div>

    <!-- Form Data Profil -->
    <form method="post" action="{{ route('user-update', $user->user_id) }}" class="bg-white p-8 rounded-lg shadow-md w-2/3">
        @method('put')
        @csrf

        <h2 class="text-2xl mb-3 text-center font-bold border-b pb-3">Edit Profile</h2>

        <div class="grid grid-cols-2 gap-4 mb-2">
            <div class="">
                <label for="name" class="block text-gray-700">Nama</label>
                <input type="text" class="mt-1 block w-full pl-1 p-2" id="name" name="name"
                    value="{{ old('name', $user->name) }}" required>
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <label for="username" class="block text-gray-700">Username:</label>
                <input type="text" class="mt-1 block w-full pl-1 p-2" id="username" name="username"
                value="{{ old('username', $user->username) }}" required>
                @error('username')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="">
            <label for="alamat" class="block text-gray-700">Alamat:</label>
            <textarea class="mt-1 block w-full pl-1 p-2" id="alamat" name="alamat" rows="3"
                required>{{ old('alamat', $user->alamat) }}</textarea>
            @error('alamat')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4 my-3 mt-2">
            <div class="">
                <label for="kabupaten" class="block text-gray-700">Kabupaten:</label>
                <input type="text" class="mt-1 block w-full pl-1 p-2" id="kabupaten" name="kabupaten"
                    value="{{ old('kabupaten', $user->kabupaten) }}" required>
                @error('kabupaten')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <div class="">
                <label for="no_telepon" class="block text-gray-700">No Telepon:</label>
                <input type="number" class="mt-1 block w-full pl-1 p-2" id="no_telepon" name="no_telepon"
                    value="{{ old('no_telepon', $user->no_telepon) }}" required>
                @error('no_telepon')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
{{--
        <div class="">
            <div class="">
                <label for="jalan" class="block text-gray-700">Jalan:</label>
                <textarea class="mt-1 block w-full pl-1 p-2" id="jalan" name="jalan" rows="3"
                    required>{{ old('jalan', $user->jalan) }}</textarea>
                @error('jalan')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div> --}}

            <div class="">
                <label class="block text-gray-700">Jenis Kelamin:</label>
                <div class="mt-1">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio" name="jenis_kelamin" value="Laki-laki"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Laki-laki' ? 'checked' : '' }}>
                        <span class="ml-1">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio ml-1" name="jenis_kelamin" value="Perempuan"
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}>
                        <span class="ml-1">Perempuan</span>
                    </label>
                </div>
                @error('jenis_kelamin')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" name="update" class="mt-6 bg-red-500 hover:bg-red-600 active:bg-red-700 text-white px-4 py-2 rounded-lg w-full">Update</button>
        </div>
    </form>
</div>
