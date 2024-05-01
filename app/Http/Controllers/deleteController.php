<?php


namespace App\Http\Controllers;
use App\Models\deploy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class deleteController extends Controller
{
    public function delete($staffId) {
        $deploy = deploy::find($staffId);
        if ($deploy) {
            $deploy->delete();
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 404]);
        }
    }
}
