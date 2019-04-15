<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Online Car and Car Parts shop">
    <meta name="author" content="Global Car Shop">
    <link rel="icon" type="image/png" href="{{ asset('storage/images/devil.ico') }}">
    <title>{{ config('app.name', 'Laravel') }} Digital Reciept</title>
  </head>
  <body style="color:#979799;">
    <h2 style="text-align:center;margin-bottom:0px;color:#808082;">{{ config('app.name', 'Laravel') }}</h2>
    <h3 style="text-align:center;margin-bottom:20px;">Digital Reciept no.{{$invoice->id}}</h3>
    <h4 style="margin-bottom:20px;">{{$invoice->getConsumer()->getFullName()}}</h4>

    <p>This is the digital reciept of your purchase from {{ config('app.name', 'Laravel') }} on {{$invoice->created_at}}.</p>
    <p>Your prefered payment method for this transaction is <span class="text-capitalized font-weight-bold">{{$invoice->payment_method}}</span>.</p>

    <table style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif;border-collapse:collapse;display:block;margin-left:auto;margin-right:auto;width:720px;margin-bottom:50px;margin-top:30px;">
      <tr>
        <td style="font-weight:bold;width:350px;border: 1px solid #c6c6c6;padding: 8px;">Items</td>
        <td style="font-weight:bold;width:100px;border: 1px solid #c6c6c6;padding: 8px;text-align:center;">Quantity</td>
        <td style="font-weight:bold;width:160px;border: 1px solid #c6c6c6;padding: 8px;">Price Per Piece</td>
        <td style="font-weight:bold;width:160px;border: 1px solid #c6c6c6;padding: 8px;">Cost</td>
      </tr>

      @foreach($invoice->getCartItems() as $cart)
        <tr>
          <td style="width:350px;border: 1px solid #c6c6c6;padding: 8px;">{{$cart->getPart()->name}}</td>
          <td style="width:100px;border: 1px solid #c6c6c6;padding: 8px;text-align:center;">{{$cart->quantity}}</td>
          <td style="width:160px;border: 1px solid #c6c6c6;padding: 8px;">{{$cart->getPart()->getDiscountedPrice()}}</td>
          <td style="width:160px;border: 1px solid #c6c6c6;padding: 8px;">{{$cart->getTotalPartCost()}}</td>
        </tr>
      @endforeach

      <tr>
        <td style="font-weight:bold;width:350px;border:1px solid #c6c6c6;border-right:0px;padding: 8px;">Total</td>
        <td style="font-weight:bold;width:100px;border-bottom:1px solid #c6c6c6;padding: 8px;"></td>
        <td style="font-weight:bold;width:160px;border-bottom:1px solid #c6c6c6;padding: 8px;"></td>
        <td style="font-weight:bold;width:160px;border:1px solid #c6c6c6;border-left:0px;padding: 8px;">$ {{$invoice->total_amount}} USD</td>
      </tr>
    </table>

    <p>Thanks for your purchase,<br>
      {{ config('app.name', 'Laravel') }}
    </p>
  </body>
</html>
