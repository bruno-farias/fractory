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
        $path = $this->orders->uploadCsv($request);
        return $this->orders->createPreOrder($request->get('email'), $path);
    }

    public function check(string $email)
    {
        return response()->json([
            'exists' => $this->orders->checkPreviousPreOrder($email)
        ]);
    }

    public function getPreviousOrder(int $requester)
    {
        return response()->json([
            'order' => $this->orders->getExistentPreOrder($requester)
        ]);
    }
}
