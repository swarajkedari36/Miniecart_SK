<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">
    <div class="container">
        <h2 class="mb-4">🛒 Your Shopping Cart</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('cart') && count(session('cart')) > 0)
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach(session('cart') as $id => $details)
                        @php $subtotal = $details['price'] * $details['quantity']; $total += $subtotal; @endphp
                        <tr>
                            <td>{{ $details['name'] }}</td>
                            <td>₹{{ $details['price'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>₹{{ $subtotal }}</td>
                            <td>
                                <form action="{{ url('cart/increase/'.$id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    <button class="btn btn-sm btn-primary">+</button>
                                </form>
                                <form action="{{ url('cart/remove/'.$id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">🗑️</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="text-end">Total: ₹{{ $total }}</h4>

            <div class="mt-4">
                <form action="{{ url('cart/clear') }}" method="POST" style="display:inline-block">
                    @csrf
                    <button class="btn btn-warning">Clear Cart</button>
                </form>

                <form action="{{ url('cart/checkout') }}" method="POST" style="display:inline-block">
                    @csrf
                    <button class="btn btn-success">Checkout</button>
                </form>
            </div>
        @else
            <p>Your cart is empty.</p>
        @endif

        <div class="mt-3">
            <a href="{{ url('/') }}" class="btn btn-secondary">⬅ Back to Products</a>
        </div>
    </div>
</body>
</html>
