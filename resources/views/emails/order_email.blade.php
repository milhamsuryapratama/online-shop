@component('mail::message')
    Hi <strong>{{ Auth::user()->name }}</strong>, You have just made a transaction with the transaction code <strong>PROVO-{{ $transaction->id }}</strong>, along with a list of your orders

<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>

<table id="customers">
    <tr>
        <th>NO</th>
        <th>Produk</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Subtotal</th>
    </tr>
    @foreach($cart as $c)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $c->product->product_name }}</td>
            <td>{{ $c->qty }}</td>
            <td>@currency($c->product->price)</td>
            <td>@currency($c->qty * $c->product->price)</td>
        </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td colspan="4">@currency($transaction->total)</td>
    </tr>
</table>

<br>
Thanks,<br>
MyOnlineShop
@endcomponent
