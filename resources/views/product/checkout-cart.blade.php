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
    @php
        $shippingTexts = [
        "shippingAddressText"=> __('constants.shippingAddressText'),
        "firstname"=> __('constants.firstname'),
        "lastname"=> __('constants.lastname'),
       "telephoneNumber"=> __('constants.telephoneNumber'),
       "city"=> __('constants.city'),
       "codePostal"=> __('constants.codePostal'),
       "address"=> __('constants.Address'),
       "order"=> __('constants.order'),
        ];
    @endphp
    <checkout
        :currency="{{json_encode(request()->currency)}}"
        :shippingtexts="{{json_encode($shippingTexts)}}"
    ></checkout>
@endsection
