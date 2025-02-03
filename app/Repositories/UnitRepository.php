<?php

namespace App\Repositories;

use App\Contracts\UnitContract;
use App\Models\Unit;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnitRepository implements UnitContract
{

    protected $model;

    public function __construct(Unit $model)
    {
        $this->model = $model;
    }

    public function getAllUnit()
    {
        $data = $this->model->get();

        $data->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at)->format('F j, Y');
            return $item;
        });

        return $data;
    }

    public function updateOrCreateUnit($data)
    {
        return $this->model->updateOrCreate(
            [
                'id' => $data['id'] ?? null,
            ],
            [
                'unit' => $data['unit'],
                'unit_slug' => $data['unit_slug'],
                'no_products' => $data['no_products'] ?? 0,
                'unit_status' => $data['unit_status'],
                'created_at' => Carbon::now(),
            ]
        );
    }
}
