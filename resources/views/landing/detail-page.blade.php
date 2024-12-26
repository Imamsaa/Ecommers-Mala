@extends('layouts.layouts-landing')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <!-- Produk -->
    <head>
    
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            padding: 50px;
            background-color: #fff;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 1200px;
        }
        .product-image {
            width: 45%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .product-image img {
            width: 100%;
            height: auto;
            max-width: 500px;
            border-radius: 8px;
        }
        .product-info {
            width: 50%;
            padding: 20px;
        }
        .product-info h1 {
            font-size: 28px;
            margin-bottom: 20px;
        }
        .product-info p {
            font-size: 18px;
            margin: 10px 0;
        }
        .price {
            font-size: 24px;
            font-weight: bold;
            color: #e74c3c;
        }
        .color-options {
            margin: 20px 0;
        }
        .color-options span {
            margin-right: 15px;
            cursor: pointer;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .color-options span:hover {
            background-color: #f0f0f0;
        }
        .buy-buttons {
            margin-top: 30px;
        }
        .buy-buttons button {
            background-color: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            cursor: pointer;
            margin-right: 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .buy-buttons button:hover {
            background-color: #003366;
        }
        .description {
            margin-top: 20px;
            font-size: 16px;
        }
        .description h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }
        .description p {
            font-size: 16px;
            color: #555;
        }
        .ulasan {
            display: flex;
            flex-direction: column;
        }
        .ulasan input[type="text"] {
            padding : 10px;
            width: 100%;
            display: block;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .ulasan button {
            background-color: #0d5194;
            color: white;
            margin-top: 10px;
            padding : 10px;
        }
    </style>
</head>
    <div class="container product-card" data-id="{{ $product->id }}"
            data-name="{{ $product->name }}"
            data-price="{{ $product->price }}"
            data-image="{{ $product->getPrimaryImage() }}"
            data-category="{{ $product->category->name }}">
        <!-- Gambar Produk -->
        <div class="product-image">
            <img src="{{ $product->getPrimaryImage() }}" alt="Produk">
        </div>

        <!-- Info Produk -->
        <div class="product-info">
            <h1>{{ $product->name }}</h1>
            <h4>{{ $product->category->name }}</h4>
            <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p> 

            <div class="buy-buttons">
                <button class="add-to-cart-btn">+ Keranjang</button>
            </div>

            <div class="description">
                <h3>Deskripsi Produk</h3>
                <p>{{ Str::limit($product->description,1000) }}</p>
            </div>
        </div>
    </div>

    <!-- review -->
     

        <div class="container" style="display:block;">
            <h2>ULASAN PILIHAN</h2>
            <div class="cont-review-summary">
                <div class="review-summary">
                    <div class="rating">
                        <span class="rating-stars">
                            <i class="fas fa-star"></i> {{ $rata }} / 5.0
                        </span>
                        <div class="rating-progress">
                            <div class="rating-filled" style="width: 90%;"></div>
                        </div>
                    </div>
                    <div class="rating-info">
                        <span>{{ $persen }}% pembeli merasa puas</span>
                        <span>{{ $totalCount }} rating | {{ $totalCount }} ulasan</span>
                    </div><br>
                </div>
            
                <!-- Filter Ulasan dan Kontrol Jumlah -->
            </div>        
            @foreach($ulasan as $u)
            <div class="review-items">
                <div class="review-item">
                    <div class="review-header">
                        <span class="reviewer-name">{{ $u->name }}</span>
                    </div>
                    <p class="review-text">{{ $u->describ }}</p>
                </div>
            </div>
            @endforeach
            <form action="{{ url('ulasan') }}" method="post">
                {{ csrf_field() }}
                <div class="ulasan">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="text" name="name" placeholder="Tulis nama">
                    <input type="text" name="describ" placeholder="Tulis Ulasan">
                    <div class="radio">
                        <label><input type="radio" name="rating" value="5"> 5 stars</label>
                        <label><input type="radio" name="rating" value="4"> 4 stars</label>
                        <label><input type="radio" name="rating" value="3"> 3 stars</label>
                        <label><input type="radio" name="rating" value="2"> 2 stars</label>
                        <label><input type="radio" name="rating" value="1"> 1 star</label>
                    </div>
                    <button type="submit">Kirim</button>
                </div>
            </form>
        </div> 
@endsection
