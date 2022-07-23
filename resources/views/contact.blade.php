@extends('layouts.app')
@section('content')
    @php
        $texts = [
            "name"=> __('constants.name'),
               "telephoneNumber"=> __('constants.telephoneNumber'),
               "contactUsMessage"=> __('constants.contactUsMessage'),
               "send"=> __('constants.send'),
               "contactUs"=> __('constants.contactUs'),
        ];
    @endphp
    <contact-us :texts="{{json_encode($texts)}}"></contact-us>
@endsection
