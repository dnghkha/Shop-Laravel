@extends('web.layout.master')
@section('content')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <form action="{{route('checkout_store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <h6 class="coupon__code"><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click
                                here</a> to enter your code</h6>
                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Fist Name<span>*</span></p>
                                    <input type="text" name="c_fname">
                                    @error('c_fname')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Last Name<span>*</span></p>
                                    <input type="text" name="c_lname">
                                    @error('c_lname')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" placeholder="" class="checkout__input__add" name="c_address">
                            @error('c_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Phone<span>*</span></p>
                            <input type="text" placeholder="" class="checkout__input__add" name="c_phone">
                            @error('c_phone')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="text" placeholder="" class="checkout__input__add" name="c_email_address">
                            @error('c_email_address')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        
                        <div class="checkout__input">
                            <p>Order notes</p>
                            <input type="text" placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                        <div class="form-group">
                            <label for="c_ship_different_address" class="text-black" data-toggle="collapse"
                                href="#ship_different_address" role="button" aria-expanded="false"
                                aria-controls="ship_different_address"><input type="checkbox" value="1"
                                    id="c_ship_different_address"> Ship To A Different Address?</label>
                            <div class="collapse" id="ship_different_address">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Fist Name<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="checkout__input">
                                            <p>Last Name<span>*</span></p>
                                            <input type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__input">
                                    <p>Address<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add">
                                </div>
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add">
                                </div>
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" placeholder="" class="checkout__input__add">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <table class="table checkout__order__products">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @foreach ($list as $item)
                                    @php
                                    $total += $item['buyqty']*$item['price'];
                                    @endphp
                                    <tr>
                                        <td>{{$item['name']}}({{$item['buyqty']}})</td>
                                        <td>{{number_format($item['price']*$item['buyqty'])}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>{{number_format($total)}}</span></li>
                                <li>Tax(8%) <span>{{number_format($total*8/100)}}</span></li>
                                <li>Total <span>{{number_format($total+($total*8/100))}}</span></li>
                            </ul>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->

@endsection