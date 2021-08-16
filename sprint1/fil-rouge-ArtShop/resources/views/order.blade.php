@extends('layouts.app')

@section('content')

    <style>
        .card {
            margin: auto;
            width: 38%;
            max-width: 600px;
            padding: 4vh 0;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-top: 3px solid rgb(252, 103, 49);
            border-bottom: 3px solid rgb(252, 103, 49);
            border-left: none;
            border-right: none
        }

        @media(max-width:768px) {
            .card {
                width: 90%
            }
        }

        .title {
            color: rgb(252, 103, 49);
            font-weight: 600;
            margin-bottom: 2vh;
            padding: 0 8%;
            font-size: initial
        }

        #details {
            font-weight: 400
        }

        .info {
            padding: 5% 8%
        }

        .info .col-5 {
            padding: 0
        }

        #heading {
            color: grey;
            line-height: 6vh
        }

        .pricing {
            background-color: #ddd3;
            padding: 2vh 8%;
            font-weight: 400;
            line-height: 2.5
        }

        .pricing .col-3 {
            padding: 0
        }

        .total {
            padding: 2vh 8%;
            color: rgb(252, 103, 49);
            font-weight: bold
        }

        .total .col-3 {
            padding: 0
        }

        .footer {
            padding: 0 8%;
            font-size: x-small;
            color: black
        }

        .footer img {
            height: 5vh;
            opacity: 0.2
        }

        .footer a {
            color: rgb(252, 103, 49)
        }

        .footer .col-10,
        .col-2 {
            display: flex;
            padding: 3vh 0 0;
            align-items: center
        }

        .footer .row {
            margin: 0
        }

        #progressbar {
            margin-bottom: 3vh;
            overflow: hidden;
            color: rgb(252, 103, 49);
            padding-left: 0px;
            margin-top: 3vh
        }

        #progressbar li {
            list-style-type: none;
            font-size: x-small;
            width: 25%;
            float: left;
            position: relative;
            font-weight: 400;
            color: rgb(160, 159, 159)
        }

        #progressbar #step1:before {
            content: "";
            color: rgb(252, 103, 49);
            width: 5px;
            height: 5px;
            margin-left: 0px !important
        }

        #progressbar #step2:before {
            content: "";
            color: #fff;
            width: 5px;
            height: 5px;
            margin-left: 32%
        }

        #progressbar #step3:before {
            content: "";
            color: #fff;
            width: 5px;
            height: 5px;
            margin-right: 32%
        }

        #progressbar #step4:before {
            content: "";
            color: #fff;
            width: 5px;
            height: 5px;
            margin-right: 0px !important
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #ddd;
            border-radius: 50%;
            margin: auto;
            z-index: -1;
            margin-bottom: 1vh
        }

        #progressbar li:after {
            content: '';
            height: 2px;
            background: #ddd;
            position: absolute;
            left: 0%;
            right: 0%;
            margin-bottom: 2vh;
            top: 1px;
            z-index: 1
        }

        .progress-track {
            padding: 0 8%
        }

        #progressbar li:nth-child(2):after {
            margin-right: auto
        }

        #progressbar li:nth-child(1):after {
            margin: auto
        }

        #progressbar li:nth-child(3):after {
            float: left;
            width: 68%
        }

        #progressbar li:nth-child(4):after {
            margin-left: auto;
            width: 132%
        }

        #progressbar li.active {
            color: black
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: rgb(252, 103, 49)
        }
    </style>
    <div class="container-fluid flin">
        <div class="card">
            <div class="title">Details d'achat</div>
            <div class="info">
                <div class="row">
                    <div class="col-7"> <span id="heading">User Identification</span><br> <span id="details">{{ $user->name }}</span> </div>
                    <div class="col-5 pull-right"> <span id="heading">Order No.</span><br> <span id="details">{{\Illuminate\Support\Str::substr($user->password,4,10)}}</span> </div>
                </div>
            </div>
            @foreach($carts as $cart)
            <div class="pricing">
                @foreach($cart->items as $it)
                <div class="row space-y-5" style="border: 1px solid rgba(0,0,0,0.6);">
                    <span class="float-right">
                        <img src="{{\Illuminate\Support\Facades\Storage::url($it['image'])}}" />
                    </span>
                    <div class="col-9"> <span id="name">{{$it['name']}}</span> </div>
                    <hr>
                    <div class="col-3">  <span id="price">{{$it['price'] * $it['qty'] }} MAD</span>     <small class="text-muted">Qte : </small> <span id="qty" class="badge badge-primary badge-pill">{{$it['qty']}}</span> </div>
                    <hr>
                </div>
                @endforeach
            </div>

            <div class="total">

                <div class="row">
                    <div class="col-9">TOTAL</div>
                    <div class="col-3"><big>{{$cart->totalPrice}} MAD</big></div>
                </div>
            </div>
            @endforeach
            <div class="footer">
                <div class="row">

                    <div class="col-10">Merci  {{ $user->name }} d'avoir utiliser notre plateforme</div>
                </div>
            </div>
        </div>
    </div>

@endsection

