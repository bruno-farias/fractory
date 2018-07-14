<?php

namespace Tests\Unit;

use League\Csv\Reader;
use Tests\TestCase;

class OrdersTest extends TestCase
{
    public function testSavePreOrderToDatabase()
    {
        $csv = Reader::createFromPath(public_path('storage/order/test@test.com/pre_order.csv'), 'r');

        $this->assertEquals(57, $csv->count());
    }
}
