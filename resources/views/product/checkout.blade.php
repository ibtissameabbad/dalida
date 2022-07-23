@extends('layouts.app')

@section('style')
    <style>
            /* Style the tab */
        .tab {
            overflow: hidden;
            /* border: 1px solid #ccc; */
            background-color: #fff;
            margin: 0;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: lightgrey;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }
        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #f3f3f4;
            color: #000;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #fff;
            color: #17a2b9;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            /* border: 1px solid #ccc; */
            border-top: none;
        }
    </style>
@endsection

@section('content')
    <h3 id="title" class="font-weight-bold my-4">Shipping Adress Types</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex flex-row justify-content-between">
                @if (\App\Models\ShippingAddress::all()->contains('user_id', Auth::user()->id))
                <div id="tabs" class="card col-md-8 px-0 border-0 rounded-xl shadow-sm">
                    <div class="tab d-flex flex-row justify-content-around rounded-xl py-2">
                        @if(Auth::user()->shippingAddress->type == 'Home')
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold active" onclick="openTab(event, 'Home')">Home</button>
                        @else
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold" onclick="openTab(event, 'Home')">Home</button>
                        @endif
                        @if(Auth::user()->shippingAddress->type == 'Work')
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold active" onclick="openTab(event, 'Work')">Work</button>
                        @else
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold" onclick="openTab(event, 'Work')">Work</button>
                        @endif
                        @if(Auth::user()->shippingAddress->type == 'Other')
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold active" onclick="openTab(event, 'Other')">Other</button>
                        @else
                            <button class="tablinks rounded-xl w-25 h-50 font-weight-bold" onclick="openTab(event, 'Other')">Other</button>
                        @endif
                    </div>
                    @if(Auth::user()->shippingAddress->type == 'Home')
                        <div id="Home" class="tabcontent d-block">
                            <h5 class="mx-4 mt-2 font-weight-bold">Home Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Apartment or Villa Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Apartment or Villa Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Home')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Home')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="Home" class="tabcontent">
                            <h5 class="mx-4 mt-2 font-weight-bold">Home Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Apartment or Villa Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Apartment or Villa Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Home')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Home')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Home')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->shippingAddress->type == 'Work')
                        <div id="Work" class="tabcontent d-block">
                            <h5 class="mx-4 mt-2 font-weight-bold">Work Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Society Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Society Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Work')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Work')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="Work" class="tabcontent">
                            <h5 class="mx-4 mt-2 font-weight-bold">Work Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Society Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Society Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Work')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Work')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Work')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->shippingAddress->type == 'Other')
                        <div id="Other" class="tabcontent d-block">
                            <h5 class="mx-4 mt-2 font-weight-bold">Other Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Apartment or Villa Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Apartment or Villa Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Other')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Other')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="Other" class="tabcontent">
                            <h5 class="mx-4 mt-2 font-weight-bold">Other Shipping Address</h5>
                            <div class="col-md-12 my-3">
                                <div class="col-md-12">
                                    <span class="small text-muted">Apartment or Villa Name</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                        <input id="local" type="text" name="apartment" value="{{ Auth::user()->shippingAddress->apartment }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Apartment or Villa Name" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">Street Name or N°</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                    <input id="street" type="text" name="street" value="{{ Auth::user()->shippingAddress->street }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Street Name or N°" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <span class="small text-muted">Area</span>
                                    @if(Auth::user()->shippingAddress->type == 'Other')
                                        <input id="area" type="text" name="area" value="{{ Auth::user()->shippingAddress->area }}" class="form-control rounded-xl h-50">
                                    @else
                                        <input id="local" type="text" name="apartment" placeholder="Area" class="form-control rounded-xl h-50">
                                    @endif
                                </div>
                                <div class="col-md-12 my-3">
                                    <span class="small text-muted">City</span>
                                    <select class="form-control rounded-xl h-50" name="city" id="city">
                                        @if(Auth::user()->shippingAddress->type == 'Other')
                                            <option selected value="{{ Auth::user()->shippingAddress->city }}">{{ Auth::user()->shippingAddress->city }}</option>
                                        @else
                                            <option selected value="City">City</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <span class="small text-muted">Country</span>
                                    <select class="form-control rounded-xl h-50" name="country" id="country">
                                        @if(Auth::user()->shippingAddress->type == 'Other')
                                            <option selected value="{{ Auth::user()->shippingAddress->country }}">{{ Auth::user()->shippingAddress->country }}</option>
                                        @else
                                            <option selected value="Country">Country</option>
                                            <option value="Rabat">Rabat</option>
                                            <option value="Casablanca">Casablanca</option>
                                            <option value="Marrakech">Marrakech</option>
                                            <option value="Tanger">Tanger</option>
                                            <option value="Agadir">Agadir</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @else
                <div>
                    <a href="/profile/shipping-address" class="alert font-weight-bold">Please Complete your Shipping Adress to continue your checkout !</a>
                </div>
                @endif
                <div class="col-md-4 d-flex flex-column">
                    @php
                        $total = request()->get('total');
                        $session = request()->get('session');
                    @endphp
                    <div class="card d-flex flex-end align-items-center border-0 rounded-xl shadow-sm h-70">
                        <h3 class="my-4"><b>Total :</b> <strong class="text-success"><b>${{ $total }}</b></strong></h3>
                    </div>
                    <a class="btn btn-primary rounded-xl shadow-lg mx-3 mt-3 py-1" href="{{ route('processTransaction', ['total' => $total, 'session' => $session] ) }}"><b>Pay With PayPal</b></a>

                    @if(\Session::has('error'))
                        <div class="alert alert-danger">{{ \Session::get('error') }}</div>
                        {{ \Session::forget('error') }}
                    @endif
                    @if(\Session::has('success'))
                        <div class="alert alert-success">{{ \Session::get('success') }}</div>
                        {{ \Session::forget('success') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function openTab(evt, tabName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
</script>
{{-- <script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
    // Call your server to set up the transaction
         createOrder: function(data, actions) {
            return fetch('/api/paypal/order/create', {
                method: 'POST',
                body:JSON.stringify({
                    'course_id': "{{$course->id}}",
                    'user_id' : "{{auth()->user()->id}}",
                    'amount' : $("#paypalAmount").val(),
                })
            }).then(function(res) {
                //res.json();
                return res.json();
            }).then(function(orderData) {
                //console.log(orderData);
                return orderData.id;
            });
        },

        // Call your server to finalize the transaction
        onApprove: function(data, actions) {
            return fetch('/api/paypal/order/capture' , {
                method: 'POST',
                body :JSON.stringify({
                    orderId : data.orderID,
                    payment_gateway_id: $("#payapalId").val(),
                    user_id: "{{ auth()->user()->id }}",
                })
            }).then(function(res) {
               // console.log(res.json());
                return res.json();
            }).then(function(orderData) {

                // Successful capture! For demo purposes:
              //  console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                iziToast.success({
                    title: 'Success',
                    message: 'Payment completed',
                    position: 'topRight'
                });
            });
        }

    }).render('#paypal-button-container');
</script> --}}
@endsection
