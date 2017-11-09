<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeLocation;
use App\PortName;

class TypeOfLocationController extends Controller
{
    public function edit(TypeLocation $location)
    {
        return response()->json($location);
    }

    public function destroy($id)
    {

        PortName::where('type_id', $id)->update(['type_id' => null]);
        
        $type = TypeLocation::findOrFail($id);
        $type->status = 0;
        $type->save();

        $msg = [
            'title' => 'Delete!',
            'type' => 'success',
            'text' => 'Type deleted successfully.'
        ];

        return response()->json($msg);
    }

}
