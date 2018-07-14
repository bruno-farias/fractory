<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface OrdersInterface
{
    public function uploadCsv(Request $request);
}