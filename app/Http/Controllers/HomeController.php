<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    private $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->middleware('auth');
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

    $productsPage = Product::paginate(10);
    $user = Auth::user();

    $query = Product::where('flow_1_email', $user->email)
        ->orWhere('flow_2_email', $user->email)
        ->orWhere('flow_3_email', $user->email)
        ->orWhere('flow_4_email', $user->email)
        ->orWhere('flow_5_email', $user->email)
        ->orWhere('flow_6_email', $user->email)
        ->orWhere('flow_7_email', $user->email)
        ->orWhere('flow_8_email', $user->email)
        ->orWhere('flow_9_email', $user->email)
        ->orWhere('flow_10_email', $user->email)
        ->orWhere('flow_11_email', $user->email)
        ->orWhere('flow_12_email', $user->email);

    $products = $query->get();

    return view('home', compact('products', 'user', 'productsPage'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        return view('managerHome');
    }
}
