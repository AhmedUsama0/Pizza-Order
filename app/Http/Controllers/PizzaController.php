<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use pizza model inside pizzacontroller
use App\Models\Pizza;

class PizzaController extends Controller
{

    // used to protect every single route in the pizzacont
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {

        //so Pizza model fetch the data from the database and bring it to a function inside the controller which will fires(the function) when the user request the pizzas
        //route and also the function give the data to the view to be displayed
        //get all the pizza records from the database and assign it to a pizzas variable
        //every record is an object
        $pizzas = Pizza::all();
        //used to grab the data orderdBy a specific column
        // $pizzas = Pizza::orderBy('name','desc')->get();
        //get a specific record
        // $pizzas = Pizza::where('name','pizza gril')->get();
        return view('pizzas/index', ['pizzas' => $pizzas]);
    }


    public function show($id)
    {
        //find a specific record with id
        $pizza = Pizza::findOrFail($id);
        return view('pizzas/show', ['pizza' => $pizza]);
    }


    public function create()
    {
        return view('pizzas/create');
    }

    public function store()
    {
        //error_log used to print the user input but work on php artisan serve
        // error_log(request('name'));


        //assign user input to columns in database
        Pizza::create([
            "name" => request("name"),
            "type" => request("type"),
            "base" => request("base"),
            "toppings" => json_encode(request("toppings")),
        ]);
        //convert the array to a json format and assign it to the toppings column
        //data send with redirect is a session data so the user can only see if he comes from the form
        return redirect('/')->with('msg', 'Thank you for your order');
    }


    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
