@extends('layouts.layouts-landing')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <div class="container-fluid">
    <div class="container">
      <section class="hero">
        <div>
            <h1><strong>Lengkapi</strong> Rumah Impian Anda Hanya <strong>di Rama Jaya!</strong></h1> 
            <p>Perlengkapan rumah tangga kami dirancang untuk memberikan kenyamanan dan efisiensi dalam membersihkan rumah. Dapatkan produk berkualitas untuk memudahkan Anda menjaga kebersihan dengan lebih mudah dan praktis.</p>
            <button class="btn">
              <i class="fab fa-whatsapp"></i>
                Hubungi Kami
            </button>
        </div>
        <img src="frontend/img/header.png" alt="Cleaning supplies">
      </section>
    </div>
  </div>

  <section class="features">
    <div>
      <i class="fas fa-check-circle"></i>
      <p>Kualitas Terjamin</p>
    </div>
    <div>
      <i class="fas fa-user-tie"></i>
      <p>Pelayanan Profesional</p>
    </div>
    <div>
      <i class="fas fa-tags"></i>
      <p>Harga Terjangkau</p>
    </div>
  </section>
    <!-- Products Section -->
    <div id="featured-products" class="products-section bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Featured Products</h2>
                <form id="filter-form" action="{{ route('home') }}" method="GET"
                    class="flex flex-col sm:flex-row gap-4 items-center">
                    <!-- Search Input -->
                    <div class="w-full sm:flex-1">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Search products..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500" />
                    </div>
                    <!-- Category Filter -->
                    <div class="w-full sm:w-auto">
                        <select name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Sort Filter -->
                    <div class="w-full sm:w-auto">
                        <select name="sort"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-300 focus:border-blue-500">
                            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                            <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to
                                High</option>
                            <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High
                                to Low</option>
                        </select>
                    </div>
                    <div class="w-full sm:w-auto">
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-2 bg-blue-700 text-white font-medium rounded-lg hover:bg-blue-600 transition-colors">
                            Apply Filters
                        </button>
                    </div>
                </form>
            </div>

            <!-- Products Grid -->
            <div id="products-container">
                @include('partials.product-user', ['products' => $products])
            </div>
        </div>
    </div>



    <!-- Newsletter Section -->
    <div id="newsletter-section" class="bg-blue-50 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Subscribe to Our Newsletter</h2>
                <p class="text-gray-600 mb-6">Get the latest updates about our products and offers.</p>
                <form id="newsletter-form" class="max-w-md mx-auto">
                    @csrf
                    <div class="flex gap-4">
                        <input type="email" name="email" placeholder="Enter your email"
                            class="flex-1 px-4 py-2 rounded-lg border border-gray-200 focus:border-blue-500 focus:ring-2 focus:ring-blue-200">
                        <button type="submit"
                            class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                            Subscribe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
