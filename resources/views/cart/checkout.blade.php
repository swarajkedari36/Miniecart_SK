@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-success text-white">
    <h4 class="mb-0">Checkout</h4>
  </div>
  <div class="card-body">

    @php
      $cart = session('cart', []);
      $subtotal = 0;
    @endphp

    @if(count($cart) > 0)
      <table class="table align-middle">
        <thead>
          <tr>
            <th>Product</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cart as $item)
            @php
              $total = $item['price'] * $item['quantity'];
              $subtotal += $total;
            @endphp
            <tr>
              <td>{{ $item['name'] }}</td>
              <td>{{ $item['quantity'] }}</td>
              <td>₹{{ number_format($item['price'], 2) }}</td>
              <td>₹{{ number_format($total, 2) }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr class="table-light fw-bold">
            <td colspan="3">Subtotal</td>
            <td>₹{{ number_format($subtotal, 2) }}</td>
          </tr>
          <tr class="table-light fw-bold">
            <td colspan="3">Tax (0%)</td>
            <td>₹0.00</td>
          </tr>
          <tr class="table-success fw-bold fs-5">
            <td colspan="3">Total</td>
            <td>₹{{ number_format($subtotal, 2) }}</td>
          </tr>
        </tfoot>
      </table>

      <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success w-100 mt-3">Confirm Checkout</button>
      </form>
    @else
      <p>Your cart is empty. <a href="{{ route('products.index') }}">Go shopping →</a></p>
    @endif

  </div>
</div>
@endsection
