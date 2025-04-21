@extends('layouts.layout')

@section('title', 'Create')

@section('content')
    <a class="btn" href="{{route('partners.index')}}">Back to the loot</a>

    <form action="{{route('partners.store')}}" method="post" enctype="application/x-www-form-urlencoded">
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
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            @error('partner_type_id')
                <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Name:</label>
            <input type="text" name="name" placeholder="#name#" required>
            @error('name')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Director:</label>
            <input type="text" name="director" placeholder="#Director#" required>
            @error('director')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" placeholder="#email#" required>
            @error('email')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Phone:</label>
            <input type="text" name="phone" placeholder="#phone#" required>
            @error('phone')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Address:</label>
            <input type="text" name="address" placeholder="#address#" required>
            @error('address')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Inn:</label>
            <input type="text" name="inn" placeholder="#inn#" required>
            @error('inn')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label>Raiting:</label>
            <input type="number" min="1" max="10" value="1" name="raiting" placeholder="#raiting#" required>
            @error('raiting')
            <p class="warning">{{$message}}</p>
            @enderror
        </div>
        <button class="btn" type="submit">Create partner</button>
    </form>
@endsection
