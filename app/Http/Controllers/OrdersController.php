<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\OrdersInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $orders;

    public function __construct(OrdersInterface $orders)
    {
        $this->orders = $orders;
    }


    public function upload(Request $request)
    {
        return $this->orders->uploadCsv($request);
    }
}
