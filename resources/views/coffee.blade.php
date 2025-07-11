<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milton's Coffee</title>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik:wght@400;600&display=swap');
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>
<body class="bg-[#fdfaf6] text-[#1d1d1d]">

<!-- Hero Section with Header -->
<section id="hero" class="relative bg-cover bg-center bg-no-repeat text-white" style="background-image: url('{{ asset('images/Untitled.png') }}');">
    <div class="bg-black/30 w-full h-full">
        <!-- Header -->
        <header class="px-6 py-4 flex justify-between items-center shadow-sm">
            <a href="{{ url('/') }}" class="text-2xl font-bold hover:underline text-white">LOGO</a>
            <nav class="space-x-6 hidden md:block">
                <a href="#hero" class="font-medium hover:underline text-white">Home</a>
                <a href="#produk" class="font-medium hover:underline text-white">Produk</a>
                <a href="#proses" class="font-medium hover:underline text-white">Tentang Kami</a>
                <a href="#footer" class="font-medium hover:underline text-white">Keranjang 🛒</a>
            </nav>
            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="font-medium hover:underline text-white">Logout</button>
                </form>
            </div>
        </header>

        <!-- Hero Spacer -->
        <div class="h-[400px]"></div>
    </div>
</section>

<!-- Category Navigation -->
<section class="py-12">
    <div class="flex justify-center space-x-6 text-lg font-medium text-[#331d0a]">
        <a href="#" class="border-b-4 border-[#6b3e2e] pb-1">COFFEE</a>
        <a href="#">ICE TEA</a>
        <a href="#">BEVERAGE</a>
        <a href="#">JUICES</a>
    </div>
</section>

<!-- Feature Product -->
<section id="produk" class="py-16 px-6 flex flex-col lg:flex-row items-center justify-center">
    <div class="max-w-sm">
        <img src="" alt="Choco Coffee" class="w-full">
    </div>
    <div class="lg:ml-12 mt-6 lg:mt-0 max-w-lg">
        <h2 class="text-xl font-bold">MILTON’S CHOCO COFFEE</h2>
        <p class="text-[#ffc107] mt-1">★★★★★</p>
        <p class="mt-2 text-gray-600">$1.2</p>
        <p class="mt-2 text-sm text-gray-700">
            Chocolate coffee, also known as mocha, is a delightful drink that combines the rich flavors of chocolate with invigorating coffee.
        </p>
        <div class="flex items-center mt-4 space-x-4">
            <button class="bg-[#331d0a] text-white px-4 py-2 rounded">+ 2 -</button>
            <button class="bg-[#fcbf49] px-4 py-2 rounded text-[#331d0a] font-semibold">ADD TO CART</button>
        </div>
    </div>
</section>

<!-- Process -->
<section id="proses" class="bg-[#f6f1eb] py-20 px-6 text-center">
    <h3 class="text-2xl font-bold mb-8">The Best Taste From The Process</h3>
    <div class="flex flex-wrap justify-center gap-8">
        <div class="w-40 p-4 bg-white shadow rounded">
            <p class="font-semibold mb-2">Hand Roasted</p>
            <p class="text-sm text-gray-500">Roasted with care</p>
        </div>
        <div class="w-40 p-4 bg-white shadow rounded">
            <p class="font-semibold mb-2">Direct Trade</p>
            <p class="text-sm text-gray-500">Straight from farms</p>
        </div>
        <div class="w-40 p-4 bg-white shadow rounded">
            <p class="font-semibold mb-2">Organic Taste</p>
            <p class="text-sm text-gray-500">100% natural</p>
        </div>
    </div>
</section>

<!-- Popular Flavours -->
<section class="py-20 px-6 text-center">
    <h3 class="text-2xl font-bold mb-10">Our Popular Flavour</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @for ($i = 0; $i < 4; $i++)
        <div class="bg-white p-4 rounded-lg shadow">
            <img src="https://i.ibb.co/N3P2XWx/coffee-cup.png" alt="Coffee" class="mx-auto w-32">
            <p class="mt-4 font-semibold">Hand Roasted Hot Chocolate With Milk</p>
            <p class="text-gray-500 mt-1">$1.2</p>
            <button class="bg-[#fcbf49] mt-4 px-4 py-2 rounded text-[#331d0a] font-semibold">ADD TO CART</button>
        </div>
        @endfor
    </div>
</section>

<!-- Newsletter -->
<section id="newsletter" class="bg-[#f6f1eb] py-16 px-6 flex flex-col md:flex-row items-center justify-between">
    <div>
        <h3 class="text-xl font-bold mb-2">Get New Updates And Discount Offers.</h3>
        <p class="text-sm text-gray-600">Score deals and stay ahead by signing up for updates.</p>
    </div>
    <div class="mt-4 md:mt-0 flex">
        <input type="email" placeholder="Your Email..." class="px-4 py-2 border rounded-l">
        <button class="bg-[#fcbf49] px-4 py-2 rounded-r text-[#331d0a] font-semibold">SUBSCRIBE</button>
    </div>
</section>

<!-- Footer -->
<footer id="footer" class="bg-[#331d0a] text-white py-12 px-6">
    <div class="flex flex-col md:flex-row justify-between mb-8">
        <div class="max-w-md">
            <h4 class="text-xl font-bold mb-2">Coffee Company's</h4>
            <p class="text-sm">Kami menyediakan berbagai macam kopi khas Nusantara. Untuk pengalaman yang berkesan.</p>
        </div>
        <div class="grid grid-cols-2 gap-8 mt-6 md:mt-0">
            <div>
                <h5 class="font-semibold mb-2">Page</h5>
                <ul class="space-y-1 text-sm">
                    <li>Home</li>
                    <li>Menu</li>
                    <li>Deals</li>
                    <li>Favourite</li>
                </ul>
            </div>
            <div>
                <h5 class="font-semibold mb-2">Links</h5>
                <ul class="space-y-1 text-sm">
                    <li>Facebook</li>
                    <li>Instagram</li>
                    <li>Pinterest</li>
                    <li>LinkedIn</li>
                </ul>
            </div>
        </div>
        <div class="mt-6 md:mt-0">
            <h5 class="font-semibold mb-2">Contacts</h5>
            <p class="text-sm">📍 Jl. Nya didinya no.5B</p>
            <p class="text-sm">📞 +123 4567 8910</p>
            <p class="text-sm">✉️ coffeecompany@mail.com</p>
            <p class="text-sm">🔗 www.coffeecompany.com</p>
        </div>
    </div>
</footer>

</body>
</html>
