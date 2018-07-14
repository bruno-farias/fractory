<?php


namespace App\Repositories;


use App\Repositories\Contracts\OrdersInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Orders implements OrdersInterface
{

    public function uploadCsv(Request $request)
    {
        $file = $request->file('order');
        $path = sprintf('order/%s', $request->get('email'));

        return $file->storeAs($path, 'pre_order.csv');
    }
}