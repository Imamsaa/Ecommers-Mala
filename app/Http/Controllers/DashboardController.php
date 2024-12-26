<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class DashboardController extends Controller
{
    function index()
    {
        $user = User::getUser();
        $product = Product::getProduct();
        $order = Order::getOrder();
        $price = OrderItem::getPrice();
        $data = [
            "user" => count($user),
            "product" => count($product),
            "order" => count($order),
            "price" => $price,
        ];
        return view('admin.dashboard', $data);
    }
}
