@if(session('success'))
<!-- Success -->
<div class="px-8 py-6 bg-green-400 text-white flex justify-between rounded" id="alert">
    <div class="flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20" fill="currentColor">
            <path
                d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"
            />
        </svg>
        <p>{{ session('success') }}</p>
    </div>
    <button class="text-green-100 hover:text-white" id="closeAlert">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>

<script>
    document.getElementById('closeAlert').addEventListener('click', function() {
        document.getElementById('alert').remove();
    });
</script>
@endif

@if (session('error'))
<!-- Error -->
<div
  class="bg-red-50 border border-red-400 rounded text-red-800 text-sm p-4 flex justify-between" id="alert"
>
  <div>
    <div class="flex items-center">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="h-4 w-4 mr-2"
        viewBox="0 0 20 20"
        fill="currentColor"
      >
        <path
          fill-rule="evenodd"
          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
          clip-rule="evenodd"
        />
      </svg>
      <p>
        <span class="font-bold">Info:</span>
        {{ session('error') }}
      </p>
    </div>
  </div>
  <div>
    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="h-6 w-6"
      fill="none"
      viewBox="0 0 24 24"
      stroke="currentColor"
    >
    <button>
        <path id="closeAlert"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        d="M6 18L18 6M6 6l12 12"
      />
    </button>
    </svg>
  </div>
</div>
<script>
    document.getElementById('closeAlert').addEventListener('click', function() {
        document.getElementById('alert').remove();
    });
</script>
@endif

<div class="bg-gray-100 p-10 min-h-screen flex flex-col">
    <div class="w-full mx-auto bg-white shadow-lg rounded-lg p-5 flex-grow">
        <h2 class="text-3xl font-bold text-red-600 mb-6">Keranjang Belanja</h2>

        <!-- Daftar Produk -->
        <div class="mb-6">
            @if(count($cart) > 0)
            <div class="flex flex-col gap-4">
                @foreach($cart as $item)
                <div class="cart-item" data-harga="{{ $item['harga'] }}" data-stock="{{ $item['stock'] ?? '0' }}"
                    data-id="{{ $item['product_id'] }}">
                    <div class="flex items-center justify-between bg-white rounded-lg shadow-md p-4">
                        <div class="flex items-center">
                            <img src="{{ $item['picture'] }}" alt="{{ $item['name'] }}"
                                class="w-24 h-24 object-cover rounded-md">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-800">{{ $item['name'] }}</h4>
                                <p class="text-gray-600">{{ number_format($item['harga'], 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Stok: {{ $item['stock'] ?? 'Tidak tersedia' }}</p>
                                <p class="text-sm text-gray-500">Warna: {{ $item['color'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1">
                            <!-- Tombol Kurang -->
                            <form action="{{ route('cart.decrease.quantity', ['product_id' => $item['product_id']]) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <input type="hidden" name="operation" value="subtract">
                                <button type="submit"
                                    class="bg-red-500 text-white font-bold py-1 px-3 rounded-full hover:bg-red-700">-</button>
                            </form>

                            <!-- Kuantitas -->
                            <input type="number" id="kuantitas-{{ $item['product_id'] }}"
                                class="kuantitas w-[80px] text-center border border-gray-300"
                                value="{{ $item['kuantitas'] }}" min="1" max="{{ $item['stock'] }}" readonly>

                            <!-- Tombol Tambah -->
                            <form action="{{ route('cart.update.quantity', ['product_id' => $item['product_id']]) }}"
                                method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <input type="hidden" name="operation" value="add">
                                <button type="submit"
                                    class="bg-green-500 text-white font-bold py-1 px-3 rounded-full hover:bg-green-700">+</button>
                            </form>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('cart.remove') }}" method="post">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                <button class="text-gray-500 hover:text-red-600">&times;</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p>Tidak ada produk dalam keranjang belanja Anda.</p>
            @endif
        </div>

        <!-- Total dan Tombol Aksi -->
        <div class="flex justify-between items-start">
            <div class="w-1/2">
                <a href="/" class="text-red-600 hover:underline">Lanjutkan Belanja</a>
            </div>
            <div class="w-1/3 bg-gray-100 p-4 rounded-lg shadow-md mt-5">
                <div class="mb-2">
                    <p class="text-center text-xl font-bold">Cart Totals</p>
                </div>
                <div class="border-t border-gray-300 pt-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Subtotal</span>
                        <span class="text-gray-700" id="subtotal">Rp 0</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Ongkos Kirim</span>
                        <span class="text-gray-700" id="shipping-cost">Rp 12.000</span>
                    </div>

                    <div class="flex justify-between font-bold text-lg">
                        <span class="text-gray-800">Total</span>
                        <span class="text-gray-800" id="total">Rp 0</span>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" method="get">
                    <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4 focus:outline-none focus:shadow-outline">
                    Checkout
                </button>
                </form>
            </div>
        </div>
    </div>
</div>

@if(count($cart) > 0)
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk mengubah kuantitas item di keranjang secara real-time
        function changeKuantitas(productId, delta) {
            const kuantitasInput = document.getElementById('kuantitas-' + productId);
            const maxStock = parseInt(kuantitasInput.getAttribute('max'));

            if (kuantitasInput) {
                let kuantitas = parseInt(kuantitasInput.value) + delta;

                // Pastikan kuantitas tidak kurang dari 1 dan tidak melebihi stok
                if (kuantitas < 1) {
                    kuantitas = 1;
                } else if (kuantitas > maxStock) {
                    kuantitas = maxStock;
                    alert('Jumlah barang melebihi stok yang tersedia.');
                }

                // Kirim permintaan AJAX untuk mengupdate kuantitas di database
                fetch(`{{ route('cart.update.quantity') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        kuantitas: kuantitas
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        kuantitasInput.value = kuantitas;
                        updateTotals(); // Update subtotal, total, dll.

                        if (data.reload) {
                            location.reload();
                        }
                    } else {
                        alert('Gagal mengupdate kuantitas di keranjang belanja.');
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        // Event listener untuk tombol tambah (+)
        document.querySelectorAll('.btn-add').forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.closest('.cart-item').dataset.id;
                changeKuantitas(productId, 1);
            });
        });

        // Event listener untuk tombol kurang (-)
        document.querySelectorAll('.btn-subtract').forEach(btn => {
            btn.addEventListener('click', function () {
                const productId = this.closest('.cart-item').dataset.id;
                changeKuantitas(productId, -1); // Kurangi 1 dari kuantitas
            });
        });

        function updateTotals() {
            let subtotal = 0;
            document.querySelectorAll('.cart-item').forEach(item => {
                const harga = parseFloat(item.dataset.harga);
                const kuantitas = parseInt(item.querySelector('.kuantitas').value);
                if (!isNaN(harga) && !isNaN(kuantitas)) {
                    subtotal += harga * kuantitas;
                }
            });

            // Update total belanja termasuk biaya pengiriman
            const shipping = 12000;
            const total = subtotal + shipping;

            document.getElementById('subtotal').textContent = 'Rp ' + subtotal.toLocaleString('id-ID');
            document.getElementById('total').textContent = 'Rp ' + total.toLocaleString('id-ID');
        }

        // Panggil fungsi updateTotals saat halaman dimuat
        updateTotals();

        // Event listener untuk setiap perubahan kuantitas
        document.querySelectorAll('.kuantitas').forEach(input => {
            input.addEventListener('change', function () {
                const productId = this.closest('.cart-item').dataset.id;
                const kuantitas = parseInt(this.value);
                if (!isNaN(kuantitas) && kuantitas >= 1) {
                    // Kirim permintaan AJAX untuk mengupdate kuantitas di database
                    fetch(`{{ route('cart.update.quantity') }}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            product_id: productId,
                            kuantitas: kuantitas
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            updateTotals();
                        } else {
                            alert('Gagal mengupdate kuantitas di keranjang belanja.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
                } else {
                    this.value = 1;
                }
            });
        });
    });
</script>
@endif
