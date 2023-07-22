<style>
    .payment-box {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .payment-box h4 {
        margin-bottom: 10px;
        font-weight: bold;
    }

    .payment-box p {
        margin-bottom: 5px;
    }

    .payment-box span {
        font-weight: bold;
    }

</style>

<div class="payment-box">
    <h4>Payment</h4>
    <p>Date of Payment: <span>{{ Carbon\Carbon::parse($payment->date_of_payment)->format('F d, Y - H:i') }}</span></p>
    <p>Payment Type: <span>{{ $payment->payment_type }}</span></p>
    <p>Payment Status: <span>{{ $payment->payment_status }}</span></p>
</div>