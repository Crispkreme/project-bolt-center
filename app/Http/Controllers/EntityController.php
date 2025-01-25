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
    public function entityStore(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'nullable|email|max:255',
                'phone' => 'nullable|string|max:15',
                'address' => 'nullable|string|max:600',
                'entity_type' => 'required|in:Customer,Supplier',
                'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('profile')) {
                $file = $request->file('profile');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('profiles', $filename, 'public');
                $data['profile'] = $filePath;
            }
            $data['entity_status'] = 'Active';

            $this->entityContract->updateOrCreateEntity($data);

            return response()->json([
                'success' => true,
                'message' => 'Customer/Supplier created successfully!',
            ]);

        } catch (\Exception $e) {
            Log::error('Error in entityStore: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the entity: ' . $e->getMessage(),
            ], 500);
        }
    }
    public function entityEdit($id)
    {
        try {
            
            $entity = $this->entityContract->findEntityById($id);

            if (!$entity) {
                return response()->json(['error' => 'Entity not found'], 404);
            }

            return response()->json($entity);
            
        } catch (Exception $e) {
            
            Log::error('Error in entityEdit: ' . $e->getMessage());
            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()->back()->with($notification);
        }
    }
    public function getSupplierList()
    {
        try {
            $suppliers = $this->entityContract->getAllSupplier();

            return response()->json([
                'success' => true,
                'suppliers' => $suppliers,
            ]);
        } catch (Exception $e) {
            Log::error('Error in getSupplierList: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error occurred: ' . $e->getMessage(),
            ], 500);
        }
    }
}
