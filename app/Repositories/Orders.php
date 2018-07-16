<?php


namespace App\Repositories;


use App\Helpers;
use App\PreOrder;
use App\Repositories\Contracts\OrdersInterface;
use App\Requester;
use Illuminate\Http\Request;
use League\Csv\Reader;

class Orders implements OrdersInterface
{

    public function uploadCsv(Request $request)
    {
        $file = $request->file('order');
        $path = sprintf('order/%s', $request->get('email'));

        return $file->storeAs($path, 'pre_order.csv');
    }

    public function createPreOrder(string $email, string $path)
    {
        $requester = Requester::create(['email' => $email]);
        $path = "storage/order/${email}/pre_order.csv";

        $csv = Reader::createFromPath(public_path($path), 'r');
        $csv->setHeaderOffset(0);
        $header = $csv->getHeader();
        $records = $csv->getRecords();

        foreach ($records as $record) {
            $preOrder = new PreOrder();
            $preOrder->requester = $requester->id;
            $preOrder->name = Helpers::setNullIfEmpty($record[$header[0]]);
            $preOrder->quantity = Helpers::setNullIfEmpty($record[$header[1]]);
            $preOrder->thickness = Helpers::setNullIfEmpty($record[$header[2]]);
            $preOrder->material = Helpers::setNullIfEmpty($record[$header[3]]);
            $preOrder->bending = Helpers::convertYesNoToBool($record[$header[4]]);
            $preOrder->threading = Helpers::convertYesNoToBool($record[$header[5]]);
            $preOrder->save();
        }

        $fieldsWithErrors = $this->validatePreOrder($requester->id);

        return response()->json([
            'errors' => $fieldsWithErrors,
            'fields' => PreOrder::whereRequester($requester->id)->get()
        ]);
    }

    public function validatePreOrder(int $requester)
    {
        return PreOrder::where('requester', $requester)
            ->where(function ($query) {
                $query->whereNull('name');
                $query->orWhereNull('quantity');
                $query->orWhereNull('thickness');
                $query->orWhereNull('material');
            })
            ->get();
    }

    public function checkPreviousPreOrder(string $email)
    {
        $requester = Requester::where('email', $email)
            ->orderBy('created_at', 'desc')
            ->take(1)
            ->get([
                'id',
                'created_at'
            ]);

        if (count($requester) == 0) {
            return false;
        }

        $hasExistentOrder = PreOrder::where('requester', $requester[0]->id)
            ->where(function ($query) {
                $query->whereNull('name');
                $query->orWhereNull('quantity');
                $query->orWhereNull('thickness');
                $query->orWhereNull('material');
            })
            ->count();

        return ($hasExistentOrder > 0) ? $requester[0] : false;
    }

    public function getExistentPreOrder(int $requester)
    {
        // Not suits for real world
        return PreOrder::whereRequester($requester)->get();
    }

    public function updateItem(Request $request)
    {
        return PreOrder::where('id', $request->get('id'))
            ->update([$request->get('field') => $request->get('value')]);
    }


}