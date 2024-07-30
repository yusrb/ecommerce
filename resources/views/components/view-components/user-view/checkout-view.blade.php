<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="w-screen">
    <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-4 md:p-5 flex-grow">

        <h2 class="text-2xl md:text-3xl font-bold text-red-600 mb-6 text-center">Checkout</h2>

        <!-- Preview Produk -->
        <div class="mb-6 w-full">
            <h3 class="text-md md:text-lg font-bold text-gray-700 mb-2">Produk yang Dipesan:</h3>
            <div class="w-full">
                @if(!empty($cart) && is_array($cart))
                @foreach($cart as $item)
                <div class="cart-item w-full mb-4" data-harga="{{ $item['harga'] }}"
                    data-stock="{{ $item['stock'] ?? '0' }}" data-id="{{ $item['product_id'] }}">
                    <div class="flex items-center justify-between bg-white rounded-lg shadow-md p-4 w-full">
                        <div class="flex items-center">
                            <img src="{{ $item['picture'] }}" alt="{{ $item['name'] }}"
                                class="w-24 h-24 object-cover rounded-md">
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-800">{{ $item['name'] }}</h4>
                                <p class="text-gray-600">{{ number_format($item['harga'], 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">Stok: {{ $item['stock'] ?? 'Tidak tersedia' }}</p>
                                <p class="text-sm text-gray-500">Warna: {{ $item['color'] }}</p>
                                <p class="text-sm text-gray-500">Kuantitas: {{ $item['kuantitas'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <p class="text-gray-700">No items in the cart.</p>
                @endif
            </div>
        </div>

        <div class="max-w-2xl mx-auto py-12">
            <h2 class="text-2xl font-bold text-center text-red-600 mb-8">Checkout</h2>
            <form id="checkout-form" action="{{ route('checkoutend') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nama Lengkap:</label>
                        <input type="text" id="name" name="name" required value="{{ $item['name_user'] }}"
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                        <input type="email" id="email" name="email" required value="{{ $item['email'] }}"
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                    </div>
                    <div>
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Nomor Telepon:</label>
                        <input type="text" id="phone" name="phone" required value="{{ $item['phone'] }}"
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                    </div>
                    <div>
                        <label for="kabupaten" class="block text-gray-700 font-bold mb-2">Kabupaten:</label>
                        <input type="text" id="kabupaten" name="kabupaten" required value="{{ $item['kabupaten'] }}"
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                    </div>
                    <div class="col-span-2">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Alamat:</label>
                        <textarea id="address" name="address" required
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">{{ $item['alamat'] }}</textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="catatan" class="block text-gray-700 font-bold mb-2">Catatan:</label>
                        <textarea id="catatan" name="catatan"
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600"></textarea>
                    </div>
                    <div class="col-span-2">
                        <label for="payment-method" class="block text-gray-700 font-bold mb-2">Metode
                            Pembayaran:</label>
                        <select id="payment-method" name="paymentMethod" required
                            class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                            <option value="bank_transfer">Transfer Bank</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="paypal">PayPal</option>
                        </select>
                    </div>
                    <div id="credit-card-info" class="col-span-2 hidden">
                        <div>
                            <label for="card-number" class="block text-gray-700 font-bold mb-2">Nomor Kartu
                                Kredit:</label>
                            <input type="text" id="card-number" name="cardNumber"
                                class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                        </div>
                        <div>
                            <label for="expiry-date" class="block text-gray-700 font-bold mb-2">Tanggal
                                Kadaluwarsa:</label>
                            <input type="text" id="expiry-date" name="expiryDate"
                                class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                        </div>
                        <div>
                            <label for="cvc" class="block text-gray-700 font-bold mb-2">CVC:</label>
                            <input type="text" id="cvc" name="cvc"
                                class="w-full bg-white border border-gray-300 rounded-md py-2 px-4 focus:outline-none focus:border-red-600">
                        </div>
                    </div>
                </div>
                <div class="flex justify-between font-bold text-lg mt-6">
                    <span class="text-gray-800">Total</span>
                    <span class="text-gray-800" id="checkout-total">Rp 0</span>
                </div>
                <div class="mt-8 flex justify-center">
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">
                        Kirim Pesanan
                    </button>
                </div>
            </form>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const cartItems = @json($cart);
                    const shippingCost = 12000;

                    const updateTotal = () => {
                        let total = 0;
                        cartItems.forEach(item => {
                            total += item.kuantitas * item.harga;
                        });
                        total += shippingCost; // Ongkir
                        document.getElementById('checkout-total').textContent = 'Rp ' + total
                            .toLocaleString('id-ID');
                    };

                    updateTotal();

                    const paymentMethod = document.getElementById('payment-method');

                    document.getElementById('checkout-form').addEventListener('submit', function (event) {
                        event.preventDefault();

                        const name = document.getElementById('name').value;
                        const email = document.getElementById('email').value;
                        const phone = document.getElementById('phone').value;
                        const kabupaten = document.getElementById('kabupaten').value;
                        const address = document.getElementById('address').value;
                        const catatan = document.getElementById('catatan').value;
                        const paymentMethodText = paymentMethod.options[paymentMethod.selectedIndex]
                            .text;
                        const total = document.getElementById('checkout-total').textContent;

                        let items = '';
                        cartItems.forEach(item => {
                            items +=
                                `\n- ${item.name} | Harga: Rp ${item.harga.toLocaleString('id-ID')} | Kuantitas: ${item.kuantitas}`;
                        });

                        const message =
                            `🛒 *Pesanan Baru*\n\n*Nama:* ${name}\n*Alamat:* ${address}\n*Kabupaten:* ${kabupaten}\n*Nomor Kontak:* ${phone}\n*Catatan:* ${catatan}\n\n*Detail Pesanan:*\n${items}\n\n*Total Pesanan (beserta ongkir):* ${total}\n\n*Metode Pembayaran:* ${paymentMethodText}\n\n_**Mohon segera konfirmasi pesanan ini.**_`;

                        const phoneNumber = '62895323955552';
                        const whatsappURL =
                            `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;

                        window.location.href = whatsappURL;
                    });
                });
            </script>
        </div>
    </div>
