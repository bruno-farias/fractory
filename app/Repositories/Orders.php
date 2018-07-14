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
        $name = sprintf('%s.csv', Carbon::now()->timestamp);
        return $file->storeAs($path, $name);
    }
}