@extends('layouts.layout')

@section('title', 'Partners Page')
@section('content')
    <a class="btn" href="{{route('partners.create')}}">Create Partner</a>
    @foreach ($partners as $partner)
        <a href="partners/edit/{{$partner->id}}">
        <div class="flex border">
            <div class="div85">
                <div class="bigSize"> {{ $partner->partnerType->name }} | {{$partner->name}}</div>
                <div> {{$partner->director}}</div>
                <div> +7 {{$partner->phone}}</div>
                <div> Рейтинг: {{$partner->rating}}</div>
            </div>
            <div class="div15 bigSize">
                {{ $partner->discount }}%
            </div>
        </div>
        </a>
        <a style="padding-left: 20px" href="partners/history/{{$partner->id}}">История реализации продукции {{$partner->name}} | {{$partner->partnerType->name}}</a>
    @endforeach
@endsection
