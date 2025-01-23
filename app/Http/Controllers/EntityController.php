<?php

namespace App\Http\Controllers;

use App\Contracts\EntityContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EntityController extends Controller
{
    protected $entityContract;

    public function __construct(
        EntityContract $entityContract,
    ) {
        $this->entityContract = $entityContract;
    }

    public function getAllSupplier()
    {
        try {
            
            $entity_type = 'Supplier';
            $entities = $this->entityContract->getAllEntityByType($entity_type);

            return view('pages.admin.entities.supplier-list', [
                'entities' => $entities,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getAllSupplier: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
    public function getAllCustomer()
    {
        try {
            
            $entity_type = 'Customer';
            $entities = $this->entityContract->getAllEntityByType($entity_type);

            return view('pages.admin.entities.customer-list', [
                'entities' => $entities,
            ]);
            
        } catch (Exception $e) {

            Log::error('Error in getAllCustomer: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        } 
    }
}
