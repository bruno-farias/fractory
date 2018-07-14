<?php

namespace Tests\Feature;

use GuzzleHttp\Client;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class OrderCsvUploadTest extends TestCase
{
    public function testOrderCsvUpload()
    {
        $file = new UploadedFile(public_path('data.csv'), 'data.csv');

        $this->call('POST', 'api/order/upload', [
            'email' => 'test@test.com'
        ], [], [
            'order' => $file,
        ]);

        $this->assertTrue(Storage::exists('order/test@test.com/pre_order.csv'));
    }
}
