@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">🛒 Your Cart</h2>

    @if(session('cart') && count(session('cart')) > 0)
        <div class="table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td><img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" width="70" height="70" class="rounded shadow"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>₹{{ number_format($item['price'], 2) }}</td>
                            <td>₹{{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                                <form action="{{ route('cart.increase', $id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">+1</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
            <div>
                <h4>Total: ₹{{ number_format($total, 2) }}</h4>
            </div>
            <div class="d-flex gap-2">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-warning">Clear Cart</button>
                </form>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary">Checkout</button>
                </form>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Continue Shopping</a>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center">
            Your cart is empty.
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    @endif
</div>
@endsection

