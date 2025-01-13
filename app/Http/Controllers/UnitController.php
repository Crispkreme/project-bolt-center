<?php

namespace App\Http\Controllers;

use App\Contracts\UnitContract;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UnitController extends Controller
{
    protected $unitContract;

    public function __construct(
        UnitContract $unitContract,
    ){
        $this->unitContract = $unitContract;
    }

    public function unitList()
    {
        try {
            
            $units = $this->unitContract->getAllUnit(10);

            return view('pages.admin.units.unit-list', [
                'units' => $units,
            ]);

        } catch (Exception $e) {

            Log::error('Error in unitList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()
                   ->back()
                   ->with($notification);
        } 
    }

    public function unitStore(Request $request, $id = null)
    {
        try {

            $data = $request->validate([
                'unit' => 'required|string|max:255',
                'unit_slug' => 'required|string|max:255|unique:units,unit_slug',
            ]);
            $data['unit_status'] = 'Active';

            if($id) {
                $data['id'] = $id;
                $this->unitContract->updateOrCreateUnit($data);
            } else {
                $this->unitContract->updateOrCreateUnit($data);
            }
            
            return redirect()->route('admin.unit.list')->with('success', 'Unit created successfully!');

        } catch (Exception $e) {

            Log::error('Error in unitList: ' . $e->getMessage());

            $notification = [
                'alert-type' => 'danger',
                'message' => 'Error occurred: ' . $e->getMessage(),
            ];

            return redirect()
                   ->back()
                   ->with($notification);
        } 
    }
}