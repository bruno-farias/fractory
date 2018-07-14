<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class OrderCsvUploadTest extends TestCase
{
    public function testOrderCsvUpload()
    {
        Storage::fake('orders');

        $this->json('POST', 'api/order/upload', [
            'order' => UploadedFile::fake()->create('order.csv', 1024),
            'email' => 'test@test.com'
        ]);

        $path = sprintf('order/test@test.com/%s.csv', Carbon::now()->timestamp);

        Storage::disk()->assertExists($path);

        Storage::disk()->assertMissing('order/test@test.com/broken.csv');

        Storage::disk()->delete($path);

        Storage::disk()->assertMissing($path);
    }
}
