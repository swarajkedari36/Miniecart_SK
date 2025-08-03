@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Our Products</h1>

    <!-- Category Filter Dropdown -->
    <form method="GET" class="mb-4 d-flex gap-2 justify-content-center flex-wrap">
        <select name="category" class="form-select w-auto">
            <option value="">All Categories</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                    {{ ucfirst($cat) }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline-primary">Filter</button>
    </form>

    <!-- Products Grid -->
    @if($products->isEmpty())
        <div class="text-center text-muted">
            <p>No products found for this category.</p>
        </div>
    @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($products as $product)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-truncate">{{ $product->name }}</h5>
                            <p class="card-text fw-bold">₹{{ number_format($product->price, 2) }}</p>
                            <span class="badge bg-secondary mb-3">{{ ucfirst($product->category) }}</span>

                            <form method="POST" action="{{ route('cart.add', $product->id) }}" class="mt-auto">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- View Cart Button -->
    <div class="text-center mt-5">
        <a href="{{ route('cart.index') }}" class="btn btn-success px-4">
            🛒 View Cart
        </a>
    </div>
</div>
@endsection
