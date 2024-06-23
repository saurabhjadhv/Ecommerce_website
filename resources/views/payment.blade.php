@extends('navbar')

@section('title', 'Laravel Form')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="{{ asset('css/payment.css') }}">
</head>
<body>
    <div class="payment-container">
        <h1>Make a Payment</h1>
        <form action="{{ route('razorpayment') }}" method="POST">
            @csrf
            <label for="amount">Amount:</label>
            <input type="number" id="amount" name="amount" required>
            <button type="submit">Pay with Razorpay</button>
        </form>
    </div>
</body>
</html>
