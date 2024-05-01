<?php


namespace App\Http\Controllers;
use App\Models\deploy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class editController extends Controller
{
    public function edit(Request $request, $staffId){
        $validator = Validator::make($request->all(), [
            
            'newrole' => 'required|max:255|string',
            'newfeeder' => 'required|max:255|string',
            'newregion' => 'required|max:255|string',
            'newdepartment' => 'required|max:255|string',
            'newreportinglinerole' => 'required|max:255|string',
            'newreportinglineemail' => 'required|max:255|string',
            'newregionalmisemail' => 'required|max:255|string',
        
        ]);
        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $deploy = deploy::find($staffId);
            if($deploy)
            {
                $deploy->newrole = $request->input('newrole');
                $deploy->newfeeder = $request->input('newfeeder');
                $deploy->newregion = $request->input('newregion');
                $deploy->newdepartment = $request->input('newdepartment');
                $deploy->newreportinglinerole = $request->input('newreportinglinerole');
                $deploy->newreportinglineemail = $request->input('newreportinglineemail');
                $deploy->newregionalmisemail = $request->input('newregionalmisemail');

                $deploy->save();
     
                return response()->json([
                    'status'=>200,
                    'message'=>'Staff Updated Successfully',
                ]);
            }
            else{
                return response()->json([
                    'status'=>404,
                    'message'=>'Staff Not Found',
                ]);
            }   
        }
    }

}
