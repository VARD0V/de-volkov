@extends('layouts.layout')

@section('title', 'Edit')

@section('content')
    <a class="btn" href="{{ route('partners.index') }}">Back to the loot</a>
    <form action="{{ route('partners.update', $partner->id) }}" method="post" enctype="application/x-www-form-urlencoded">
        @csrf

        @if($errors->any())
            <script>
                alert("Ты тупой, валидация мне не по вкусу, меняй")
            </script>
        @endif

        <div>
            <label>Type:</label>
            <select name="partner_type_id" required>
                @foreach($types as $type)
                    <option value="{{ $type->id }}" @if($type->id === $partner->partnerType->id) selected @endif>{{ $type->name }}</option>
                @endforeach
            </select>
            @error('partner_type_id')
            <p class="warning">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn" type="submit">Update partner</button>
    </form>

    <div>
        <h2>История реализации продукции</h2>
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
