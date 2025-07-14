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
    <style>
    [x-cloak] { display: none !important; }
    </style>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body x-data="cartPopup()" class="bg-[#fdfaf6] text-[#1d1d1d]">

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
<!-- Carousel Produk Lainnya -->
<section class="bg-[#fdfaf6] py-16 px-6 h-screen flex items-center justify-center">
    <div x-data="{ activeSlide: 0, slides: [0,1,2] }" class="w-full max-w-5xl mx-auto relative">
        <!-- Slides -->
        <div class="overflow-hidden">
            <div class="flex transition-transform duration-500 ease-in-out"
                 :style="`transform: translateX(-${activeSlide * 100}%);`">
                
                <!-- Slide 1 -->
                <div class="min-w-full flex flex-col lg:flex-row items-center justify-center px-6">
                    <img src="{{ asset('img/drink1.png') }}" alt="Drink 1" class="w-64">
                    <div class="lg:ml-12 mt-6 lg:mt-0 max-w-lg text-center lg:text-left">
                        <h2 class="text-xl font-bold uppercase">Latte Classic</h2>
                        <p class="text-[#ffc107] mt-1">★★★★☆</p>
                        <p class="mt-2 text-gray-600 text-sm">$1.4</p>
                        <p class="mt-2 text-sm text-gray-700">
                            A creamy blend of espresso and steamed milk, served warm and delicious.
                        </p>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="min-w-full flex flex-col lg:flex-row items-center justify-center px-6">
                    <img src="{{ asset('img/drink2.png') }}" alt="Drink 2" class="w-64">
                    <div class="lg:ml-12 mt-6 lg:mt-0 max-w-lg text-center lg:text-left">
                        <h2 class="text-xl font-bold uppercase">Vanilla Cold Brew</h2>
                        <p class="text-[#ffc107] mt-1">★★★★★</p>
                        <p class="mt-2 text-gray-600 text-sm">$1.6</p>
                        <p class="mt-2 text-sm text-gray-700">
                            Cold brewed coffee infused with vanilla essence and smooth finish.
                        </p>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="min-w-full flex flex-col lg:flex-row items-center justify-center px-6">
                    <img src="{{ asset('img /drink3.png') }}" alt="Drink 3" class="w-64">
                    <div class="lg:ml-12 mt-6 lg:mt-0 max-w-lg text-center lg:text-left">
                        <h2 class="text-xl font-bold uppercase">Hazelnut Espresso</h2>
                        <p class="text-[#ffc107] mt-1">★★★★☆</p>
                        <p class="mt-2 text-gray-600 text-sm">$1.8</p>
                        <p class="mt-2 text-sm text-gray-700">
                            A bold espresso layered with nutty hazelnut syrup, perfect to energize your day.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <div class="flex justify-between absolute top-1/2 left-0 right-0 transform -translate-y-1/2 px-4">
            <button @click="activeSlide = (activeSlide === 0 ? slides.length - 1 : activeSlide - 1)"
                    class="bg-[#331d0a] text-white px-3 py-2 rounded-full hover:bg-[#1d1005]">
                ‹
            </button>
            <button @click="activeSlide = (activeSlide === slides.length - 1 ? 0 : activeSlide + 1)"
                    class="bg-[#331d0a] text-white px-3 py-2 rounded-full hover:bg-[#1d1005]">
                ›
            </button>
        </div>

        <!-- Dots -->
        <div class="flex justify-center mt-6 space-x-2">
            <template x-for="(slide, index) in slides" :key="index">
                <button class="w-3 h-3 rounded-full"
                        :class="index === activeSlide ? 'bg-[#331d0a]' : 'bg-gray-300'"
                        @click="activeSlide = index"></button>
            </template>
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
<section class="py-16 px-6 text-center bg-[#fff]">
    <h3 class="text-2xl font-bold mb-12">Our Popular Flavour</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-10 gap-y-16">

        <!-- Card 1 -->
        <div class="relative bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-transform duration-300 transform hover:-translate-y-2 border border-gray-200">
            <span class="absolute top-4 left-4 bg-[#fcbf49] text-[#331d0a] text-xs font-semibold px-3 py-1 rounded">Latte</span>
            <img src="{{ asset('img/drink1.png') }}" alt="Drink 1" class="mx-auto w-32 transition duration-300 group-hover:scale-105">
            <div class="mt-6 text-center px-2">
                <p class="font-semibold text-sm leading-tight">Latte Classic</p>
                <p class="text-gray-500 mt-1 text-sm">$1.2</p>
            </div>
            <div class="mt-4">
            <button 
            @click="showCartPopup = true"
            class="bg-[#fcbf49] mt-4 px-4 py-2 rounded text-[#331d0a] font-semibold hover:bg-[#f1ae32] transition">
            ADD TO CART
            </button>


            </div>
        </div>

        <!-- Card 2 -->
        <div class="relative bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-transform duration-300 transform hover:-translate-y-2 border border-gray-200">
            <span class="absolute top-4 left-4 bg-[#fcbf49] text-[#331d0a] text-xs font-semibold px-3 py-1 rounded">Caramel</span>
            <img src="{{ asset('img/drink2.png') }}" alt="Drink 2" class="mx-auto w-32">
            <div class="mt-6 text-center px-2">
                <p class="font-semibold text-sm leading-tight">Iced Caramel Macchiato</p>
                <p class="text-gray-500 mt-1 text-sm">$1.5</p>
            </div>
            <div class="mt-4">
                <button 
                @click="showCartPopup = true"
                class="bg-[#fcbf49] mt-4 px-4 py-2 rounded text-[#331d0a] font-semibold hover:bg-[#f1ae32] transition">
                ADD TO CART
                </button>

            </div>
        </div>

        <!-- Card 3 -->
        <div class="relative bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-transform duration-300 transform hover:-translate-y-2 border border-gray-200">
            <span class="absolute top-4 left-4 bg-[#fcbf49] text-[#331d0a] text-xs font-semibold px-3 py-1 rounded">Vanilla</span>
            <img src="{{ asset('img/drink3.png') }}" alt="Drink 3" class="mx-auto w-32">
            <div class="mt-6 text-center px-2">
                <p class="font-semibold text-sm leading-tight">Vanilla Cold Brew</p>
                <p class="text-gray-500 mt-1 text-sm">$1.4</p>
            </div>
            <div class="mt-4">
                <button 
                @click="showCartPopup = true"
                class="bg-[#fcbf49] mt-4 px-4 py-2 rounded text-[#331d0a] font-semibold hover:bg-[#f1ae32] transition">
                ADD TO CART
                </button>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="relative bg-white p-6 rounded-2xl shadow-lg hover:shadow-2xl transition-transform duration-300 transform hover:-translate-y-2 border border-gray-200">
            <span class="absolute top-4 left-4 bg-[#fcbf49] text-[#331d0a] text-xs font-semibold px-3 py-1 rounded">Espresso</span>
            <img src="{{ asset('img/drink4.png') }}" alt="Drink 4" class="mx-auto w-32">
            <div class="mt-6 text-center px-2">
                <p class="font-semibold text-sm leading-tight">Double Shot Espresso</p>
                <p class="text-gray-500 mt-1 text-sm">$1.1</p>
            </div>
            <div class="mt-4">
                <button 
                @click="showCartPopup = true"
                class="bg-[#fcbf49] mt-4 px-4 py-2 rounded text-[#331d0a] font-semibold hover:bg-[#f1ae32] transition">
                ADD TO CART
                </button>


            </div>
        </div>

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

<!-- Shopping Cart Pop-up -->
<div 
    x-show="showCartPopup" 
    x-transition 
    x-cloak
    class="fixed inset-0 bg-black/40 flex items-center justify-center z-50">

    <div @click.outside="showCartPopup = false"
         class="bg-[#fdfaf6] rounded-lg p-6 w-full max-w-3xl shadow-2xl border border-[#fcbf49] flex flex-col md:flex-row gap-6 relative">

        <!-- Left - Product List -->
        <div class="flex-1">
            <h2 class="text-2xl font-bold mb-4 text-[#331d0a]">Shopping Cart</h2>
            
            <template x-if="cart.length > 0">
                <div class="space-y-4">
                    <template x-for="(item, index) in cart" :key="item.id">
                        <div class="flex items-center justify-between p-4 border border-[#fcbf49] rounded bg-white">
                            <div class="flex items-center gap-4">
                                <img :src="item.image" alt="Product" class="w-16 h-16 rounded">
                                <div>
                                    <p class="font-semibold text-[#331d0a]" x-text="item.name"></p>
                                    <p class="text-sm text-gray-500" x-text="'Set: ' + item.variant"></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="flex items-center border border-[#fcbf49] px-2 rounded text-[#331d0a]">
                                    <button class="px-2 hover:text-black" @click="decreaseQty(index)">−</button>
                                    <span class="px-2" x-text="item.qty"></span>
                                    <button class="px-2 hover:text-black" @click="increaseQty(index)">+</button>
                                </div>
                                <p class="font-bold text-[#331d0a]" x-text="'$' + (item.qty * item.price).toFixed(2)"></p>
                                <button class="text-red-600 hover:text-red-800" @click="removeItem(index)">🗑️</button>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <template x-if="cart.length === 0">
                <p class="text-gray-500">Cart is empty.</p>
            </template>
        </div>

        <!-- Right - Summary -->
        <div class="w-full md:w-64 bg-[#fff8e5] p-4 rounded shadow">
            <h3 class="font-semibold text-[#331d0a] mb-4">Order Summary</h3>
            <div class="text-sm space-y-2 text-[#331d0a]">
                <div class="flex justify-between"><span>Subtotal</span><span x-text="'$' + subtotal().toFixed(2)"></span></div>
                <div class="flex justify-between"><span>Discount (10%)</span><span x-text="'− $' + discount().toFixed(2)"></span></div>
                <div class="flex justify-between"><span>Delivery</span><span>$0.00</span></div>
                <hr>
                <div class="flex justify-between font-bold text-base"><span>Total</span><span x-text="'$' + total().toFixed(2)"></span></div>
            </div>
            <input type="text" placeholder="Discount voucher" class="mt-4 w-full px-3 py-2 border border-[#fcbf49] rounded text-sm" />
            <button class="w-full mt-2 py-2 bg-[#fcbf49] text-[#331d0a] rounded font-semibold hover:bg-[#e0a934] transition">
                Checkout Now
            </button>
        </div>

        <!-- Close Button -->
        <button @click="showCartPopup = false"
                class="absolute top-2 right-2 text-[#999] hover:text-[#331d0a] text-xl">&times;</button>
    </div>
</div>



<script>
function cartPopup() {
    return {
        showCartPopup: false,
        cart: [
            {
                id: 1,
                name: 'Choco Coffee',
                qty: 2,
                price: 1.2,
                image: 'https://i.ibb.co/N3P2XWx/coffee-cup.png',
                variant: 'Chocolate',
            }
        ],
        increaseQty(index) {
            this.cart[index].qty++;
        },
        decreaseQty(index) {
            if (this.cart[index].qty > 1) {
                this.cart[index].qty--;
            } else {
                this.cart.splice(index, 1);
            }
        },
        removeItem(index) {
            this.cart.splice(index, 1);
        },
        subtotal() {
            return this.cart.reduce((sum, item) => sum + item.qty * item.price, 0);
        },
        discount() {
            return this.subtotal() * 0.1;
        },
        total() {
            return this.subtotal() - this.discount();
        }
    };
}
</script>

</body>

<script>
    let quantity = 1;
    const qtyEl = document.getElementById('quantity');

    function increaseQty() {
        quantity++;
        qtyEl.textContent = quantity;
    }

    function decreaseQty() {
        if (quantity > 1) {
            quantity--;
            qtyEl.textContent = quantity;
        }
    }
</script>

</html>
