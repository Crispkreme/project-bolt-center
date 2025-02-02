<?php

namespace App\Repositories;

use App\Contracts\EntityContract;
use App\Models\Entity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EntityRepository implements EntityContract
{

    protected $model;

    public function __construct(Entity $model)
    {
        $this->model = $model;
    }

    public function updateOrCreateEntity($data)
    {
        $user = Auth::user();
        $userID = $user->id;

        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'user_id' => $data['user_id'] ?? $userID,
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'entity_type' => $data['entity_type'],
                'entity_status' => $data['entity_status'],
                'profile' => $data['profile'] ?? null,
            ]
        );
    }

    public function getAllEntityByType($entity_type)
    {
        $suppliers = $this->model
            ->with('user:id,email')
            ->where('entity_type', $entity_type)
            ->get();

        $suppliers->transform(function ($supplier) {
            return [
                'id' => $supplier->id,
                'user_id' => $supplier->user_id,
                'name' => $supplier->name,
                'email' => $supplier->email,
                'phone' => $supplier->phone,
                'address' => $supplier->address,
                'profile' => $supplier->profile,
                'entity_status' => $supplier->entity_status,
                'created_by' => optional($supplier->user)->email ?? 'N/A',
                'created_at' => Carbon::parse($supplier->created_at)->format('F j, Y'),
            ];
        });

        return $suppliers;
    }

    public function findEntityById($id)
    {
        return $this->model->find($id);
    }

    public function deleteEntityById($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    public function getSupplierSelect()
    {
        return $this->model
            ->where('entity_type', 'Supplier')
            ->where('entity_status', 'Active')
            ->select('id', 'name')
            ->get();
    }

    public function getEntityById($id, $role)
    {
        return $this->model
            ->where('id', $id)
            ->where('entity_type', $role)
            ->where('entity_status', 'Active')
            ->first();
    }
}