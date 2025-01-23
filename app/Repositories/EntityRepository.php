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
                'user_id' => $data['user_id'] ?? $userID,
            ],
            [
                'name' => $data['name'] ?? null,
                'gender' => $data['gender'],
                'birthday' => $data['birthday'],
                'gender' => $data['gender'],
                'civil_status' => $data['civil_status'],
                'gender' => $data['gender'],
                'religion' => $data['religion'],
                'address' => $data['religion'],
                'profile' => $data['profile'],
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
                'created_by' => optional($supplier->user)->email ?? 'N/A', // Use optional() to avoid errors if user is null
                'created_at' => Carbon::parse($supplier->created_at)->format('F j, Y'), // Format created_at date
            ];
        });

        return $suppliers;
    }
}