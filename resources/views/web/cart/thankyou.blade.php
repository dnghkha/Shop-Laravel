@extends('web.layout.master')
@section('content')


<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="col-lg-12">
            <div class="text-center">
                <h1 class="display-6">Thank You!</h1>
                <p class="lead"><strong>Please check your email</strong> for further instructions on how to complete
                    your account setup.</p>
                <hr>
                <p>
                    Having trouble? <a class="btn" role="button" href="{{route('contact')}}"><u
                            class="text-primary">Contact us</u></a>
                </p>
            </div>
        </div>
        <div class="cart__total">
            <div class="col-lg-12">
                <div class="text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-left">Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $total = 0;
                            @endphp
                            @foreach ($list as $item)
                            @php
                            $amount = $item->price * $item->qty;
                            $total += $amount;
                            @endphp
                            <tr>
                                <td class="text-left">{{ $item->product->name }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>{{ number_format($amount) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-12">
                <ul class="checkout__total__all">
                    <li>Subtotal <span>{{number_format($total)}}</span></li>
                    <li>Tax(8%) <span>{{number_format($total*8/100)}}</span></li>
                    <li>Total <span>{{number_format($total+($total*8/100))}}</span></li>
                </ul>
            </div>
            <div class="col-lg-12 text-center">
                <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Continue to
                    homepage</a>
            </div>
            {{-- <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a> --}}

        </div>
    </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection