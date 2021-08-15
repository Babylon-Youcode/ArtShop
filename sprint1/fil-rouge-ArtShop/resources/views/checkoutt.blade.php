@extends('layouts.app')

@section('content')

    <style>
        .StripElement{
            box-sizing: border-box;
            height: 40px;
            padding: 10px 12px;
            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            transition: box-shadow 150ms ease;

        }

        .StripElement--focus{
            box-shadow: 0 1px 3px 0 #cfd7df;
        }
        .StripElement--invalid{
            border-color: #fa755a;
        }
        StripElement--webkit-autofill{
            background-color: #fefde5 !important;
        }
    </style>

<div class="container">
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="https://cdn.iconscout.com/icon/premium/png-256-thumb/checkout-51-623253.png" alt="" width="72" height="72">
      <h2 class="text-muted">{{  ucwords(\Illuminate\Support\Facades\Auth::user()->name )  }}</h2>
      <p class="lead">Checkout - Be ready to enjoy</p>
    </div>

    <div class="row">
      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex space-x-2 align-items-center mb-3">
          <span class="text-muted">Your Cart</span>
         <span class="badge badge-warning badge-pill">Quantity</span>
            <span class="badge badge-primary badge-pill">{{\App\Http\Controllers\CartController::getCartInfo()['quantity']}}</span>
        </h4>
        <ul class="list-group mb-3">
            @foreach(\App\Http\Controllers\CartController::getCartInfo()['items'] as $item)
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">{{$item['name']}}</h6>
              <small class="text-muted"></small>
            </div>
            <span class="text-muted">{{$item['price']}}</span>
          </li>
            @endforeach

          <li class="list-group-item d-flex justify-content-between bg-light disabled">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">-$5</span>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (MAD)</span>
            <strong class="">{{\App\Http\Controllers\CartController::getCartInfo()['total']}}</strong>
          </li>
        </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code" disabled>
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary" disabled>Redeem</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>

        <form class="needs-validation" action="/charge" method="post" id="payment-form">@csrf

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
              <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="" required>
                  <div class="invalid-feedback">
                      Valid first name is required.
                  </div>
              </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>

              <select class="custom-select d-block w-100" id="country" name="country" required>
                <option value="">Choose...</option>

              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
          </div>

          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="same-address" name="same-address">
            <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>
          <hr class="mb-4">

            <input type="hidden" name="amount" value="{{$amount}}">

            <div class="">
                <label for="card-element">
                    Payement
                </label>
                <div id="card-element">
                    <!--Stripe element-->
                </div>
                <div id="card-errors" role="alert"></div>
            </div>


            <button class="btn btn-primary btn-lg btn-block" type="submit">submit payment</button>
        </form>
      </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2020-2021 Art Shop</p>

    </footer>
  </div>


<script src="https://js.stripe.com/v3/"></script>

    <script>
        $(document).ready(function(){

            /*Country api*/
            const xhttp = new XMLHttpRequest();
            const select = document.getElementById("country");

            let countries;
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    countries = JSON.parse(xhttp.responseText);
                    assignValues();

                }
            };
            xhttp.open("GET", "https://restcountries.eu/rest/v2/all", true);
            xhttp.send();

            function assignValues() {
                countries.forEach(country => {
                    const option = document.createElement("option");
                    option.value = country.alpha2Code;
                    option.textContent = country.name;
                    select.appendChild(option);
                });
            }


            /*Stripe API*/
        })
    </script>

    <script>


            const stripe = Stripe(
                'pk_test_51JNbZJLStgHXMPaxbCyZWl47ORZQrZ2t4ak9IUGles9elPAh7po20oZnvB0YGBt6wmiPhVe17AOWDNId8nDwPBla00cJVIPBbh'
            );

            const elements = stripe.elements();


            const style={

                base:{
                    color:'#32325d',
                    fontFamily:'"Helvetica Neue", Helvetica, sans-serif',
                    fontSize:'16px',
                    margin:"12px",
                    '::placeholder':{
                        color:'#aab7c4'
                    }
                },
                iconStyle:"solid",
                invalid:{
                    color:'#fa755a',
                    iconColor: '#fa755a'
                }

            };
            const cardElement = elements.create('card',{style:style});
            cardElement.mount('#card-element');

            cardElement.addEventListener('change',e=>{

                         let displayError = document.getElementById('card-errors');
                         if(e.error){
                             displayError.textContent = e.error.message;
                         }
                         else
                         {
                             displayError.textContent = '';
                         }
            });


            const form = document.getElementById('payment-form');
            form.addEventListener('submit',e =>{

                       e.preventDefault();


                       const options={

                           firstname : document.getElementById('firstName').value,
                           lastname : document.getElementById('lastName').value,
                           email:document.getElementById('email').value,
                           address : document.getElementById('address').value,
                           country : document.getElementById('country').value,
                           shipping : document.getElementById('same-address').value

                       }

                       console.log(options);

                       stripe.createToken(cardElement,options).then((result)=>{

                           console.log(result.token);

                           if(result.error){
                               const errorElement = document.getElementById('card-errors');
                               errorElement.textContent = result.error.message;

                           }
                           else{
                               stripeTokenHandler(result.token)
                           }
                       })
            });


            function stripeTokenHandler(token){
                const form = document.getElementById('payment-form');
                const hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type','hidden');
                hiddenInput.setAttribute('name','stripeToken');
                hiddenInput.setAttribute('value',token.id);
                form.appendChild(hiddenInput);

                //form.submit();

            }


    </script>
@endsection
