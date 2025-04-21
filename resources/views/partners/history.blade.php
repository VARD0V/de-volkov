@extends('layouts.layout')

@section('title', 'Partners History')
@section('content')
<div>
    <h2>История реализации продукции</h2>
    <h3>{{$partner->name}} | {{$partner->partnerType->name}}</h3>
    @if($partner_products->isEmpty())
        <p>No product history available for this partner.</p>
    @else
        @foreach($partner_products as $partner_product)
            <div class="flex">
                <div>Data: {{ $partner_product->date }}</div>
                <div>Amount: {{ $partner_product->quantity }}</div>
                <div>Name: {{ $partner_product->name }}</div>
            </div>
        @endforeach
    @endif
</div>
@endsection
