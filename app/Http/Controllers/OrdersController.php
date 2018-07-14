<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('order');
        $path = sprintf('order/%s', $request->get('email'));
        $name = sprintf('%s.csv', Carbon::now()->timestamp);
        $file->storeAs($path, $name);
    }
}
