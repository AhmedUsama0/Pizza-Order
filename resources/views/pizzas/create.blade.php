@extends('layouts.app')


@section('content')
<div class="wrapper create-pizza">
    <h1>Create a New Pizza</h1>
    <form action="/pizzas" method="POST">
        {{-- protect the form from cross site request forgery attack --}}
        @csrf
        <label for="name">Your name:</label>
        <input type="text" name="name" id="name">
        <label for="type">Choose pizza type:</label>
        <select name="type" id="type">
            <option value="margrita">Margrita</option>
            <option value="hawaiian">Hawaiian</option>
            <option value="veg supreme">Veg Supreme</option>
            <option value="volcano">Volcano</option>
        </select>

        <label for="base">Choose base type:</label>
        <select name="base" id="base">
            <option value="chessy crust">Chessy Crust</option>
            <option value="garlic crust">Garlic Crust</option>
            <option value="thin & crispy">Thin & Crispy</option>
            <option value="thick">Thick</option>
        </select>

        {{-- Group related elements & draw a box around them --}}
        <fieldset>
            <label>Extra toppings:</label> <br>
            {{-- value property is the value which will send to the server --}}
            {{-- the data send in that case is an array not a single value --}}
            {{-- we should convert the array to json so we can store it into the database --}}
            <input type="checkbox" name="toppings[]" value="mushrooms"> Mushrooms <br>
            <input type="checkbox" name="toppings[]" value="peppers"> Peppers <br>
            <input type="checkbox" name="toppings[]" value="garlic"> Garlic <br>
            <input type="checkbox" name="toppings[]" value="olives"> Olives <br>
        </fieldset>
        <input type="submit" value="Order Pizza">
    </form>
</div>
@endsection