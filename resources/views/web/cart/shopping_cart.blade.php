@extends('web.layout.master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @if (session('msg'))
                <div class="col-md-12">
                    <div class="alert alert-{{session('type')}} alert-dismissible fade show" role="alert">
                        <strong>{!!session('msg')!!}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="cartBody">
                            @php
                            $total = 0;
                            @endphp

                            @if (!$list)
                            <tr>
                                <td colspan="3" class="text-center"><img class="img-fluid"
                                        src="{{asset('/')}}uploads/images/shopping-cart/cart_is_empty.png" alt=""></td>
                            </tr>
                            @else
                            @foreach ($list as $item)
                            @php
                            $total += $item['buyqty']*$item['price'];
                            @endphp
                            <tr id="item_{{$item['id']}}">
                                <td class="product__cart__item">
                                    <div class="product__cart__item__text">
                                        <h6>{{$item['name']}}</h6>
                                        <h5>{{number_format($item['price'])}}</h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="row">
                                            <button class="qtybtn updatebtn" data-value="decrease"
                                                data-href="{{route('cart.update',['cart'=>$item['id']])}}"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></button>
                                            <input id="buyqty_{{$item['id']}}" type="text" value="{{$item['buyqty']}}">
                                            <button class="qtybtn updatebtn" data-value="increase"
                                                data-href="{{route('cart.update',['cart'=>$item['id']])}}"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </td>
                                <td id="price_total_{{$item['id']}}" class="cart__price">
                                    {{number_format($item['buyqty']*$item['price'])}}</td>
                                <td class="cart__close">
                                    <button data-id="item_{{$item['id']}}"
                                        data-href="{{route('cart.destroy', ['cart'=>$item['id']])}}"
                                        class="btn removeitem"><i class="fa fa-close"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        @endif
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="{{route('product.index')}}">Continue Shopping</a>
                        </div>
                    </div>
                    {{-- <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <button class="btn"><i class="fa fa-spinner">Update cart</i></button>
                        </div>
                    </div> --}}
                </div>

            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span id="subTotal">{{number_format($total)}}</span></li>
                        <li>Tax(8%) <span id="tax">{{number_format($total*8/100)}}</span></li>
                        <li>Total <span id="total2">{{number_format($total+($total*8/100))}}</span></li>
                    </ul>
                    <a href="{{route('checkout')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->

@endsection