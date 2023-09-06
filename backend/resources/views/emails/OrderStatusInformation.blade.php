<x-mail::message>


    Dear, {{ $name }}<br>
    Your order has been {{ $OrderStatus }}<br>
    Order Id: #{{ $orderId }}<br>
    Order Status: {{ ($paymentStatus == 1) ? 'Paid' : 'Unpaid' }}<br>

// TODO: add payable url here.
<x-mail::button :url="''">
{{ ($paymentStatus == 1) ? 'Paid' : 'Pay Now' }}<br>
</x-mail::button>

Thanks for your order,<br>
{{ config('app.name') }}
</x-mail::message>


{{-- <x-mail::message>

    Dear, {{ $name }},<br>
Your order has been {{ $OrderStatus }}.<br>
Order Id: #{{ $orderId }}<br>
Order Status: {{ ($paymentStatus == 1) ? 'Paid' : 'Unpaid' }}<br>

<x-mail::button :url="''">
    {{ ($paymentStatus == 1) ? 'Paid' : 'Pay Now' }}
    paid
</x-mail::button>

Thanks for Your Order,<br>
{{ config('app.name') }}
</x-mail::message> --}}