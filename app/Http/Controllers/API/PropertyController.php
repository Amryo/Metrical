<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {

        $properties = Property::get();


        return [
            'status' => 200,
            'message' => 'Properties recived Successfully',
            'data' => $properties,
        ];
    }


    public function show($id)
    {
        $properties = Property::with('community')->where('id', $id)->get();


        return [
            'status' => 200,
            'message' => 'property recived Successfully',
            'data' => $properties,
        ];
    }

    public function Status($status)
    {
        $properties = Property::with('community')->where('status', $status)->get();
        return [
            'status' => 200,
            'message' => 'property recived Successfully',
            'data' => $properties,
        ];
    }
}
