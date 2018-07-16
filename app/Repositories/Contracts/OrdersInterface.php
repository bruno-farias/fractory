<?php


namespace App\Repositories\Contracts;


use Illuminate\Http\Request;

interface OrdersInterface
{
    public function uploadCsv(Request $request);

    public function createPreOrder(string $email, string $path);

    public function validatePreOrder(int $requester);

    public function checkPreviousPreOrder(string $email);

    public function getExistentPreOrder(int $requester);

    public function updateItem(Request $request);
}