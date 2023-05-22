<?php

namespace App\Http\Controllers;
use App\Models\User_Data;
use App\Models\FormData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

use App\Mail\DeleteConfirmation;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $user = auth()->user();
    
        if ($user->role == 'admin') {
            $formData = FormData::all();
            return view('user.dashboard', compact('formData'));
        } else {
            return view('user.dashboard');
        }
    }    
    
    
    public function step1()
    {
        return view('form.step1');
    }

    public function postStep1(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'contact_num' => 'required',
            'occupation' => 'required',
        ]);

        $formData = new FormData;
        $formData->name = $validated['name'];
        $formData->email = $validated['email'];
        $formData->address = $validated['address'];
        $formData->contact_num = $validated['contact_num'];
        $formData->occupation = $validated['occupation'];
        $formData->save();

        return redirect()->route('form.step2', $formData->id);
    }

    //start form 2
    public function step2($id)
    {
        $formData = FormData::find($id);
        if (!$formData) {
            abort(404);
        }
        return view('form.step2', compact('formData'));
    }

    public function postStep2(Request $request)
    {
        $validated = $request->validate([
            'beaf' => 'required',
            'expect_soluation' => 'required',
            'photo' => 'required|max:2048',
            'problem_level' => 'required',
            'suggestions' => 'required',
        ]);
        $formData = FormData::find($request->input('id'));
        if (!$formData) {
            abort(404);
        }
        $formData->beaf = $validated['beaf'];
        $formData->expect_soluation = $validated['expect_soluation'];
        $formData->photo = $validated['photo'];
        $formData->problem_level = $validated['problem_level'];
        $formData->suggestions = $validated['suggestions'];
        $formData->save();

        return redirect()->route('form.step3', $formData->id);
    }

    //start form 3
    public function step3($id)         
    {
        $formData = FormData::find($id);
        if (!$formData) {
            abort(404);
        }
        return view('form.step3', compact('formData'));
    }

    public function postStep3(Request $request)
    {
        $validated = $request->validate([
            'district' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'grama_name' => 'required',
            'gcontact_num' => 'required',
            'authorized_per_name' => 'required',
            'authorized_per_num' => 'required',
        ]);

        $formData = FormData::find($request->input('id'));
        if (!$formData) {
            abort(404);
        }
        $formData->district = $validated['district'];
        $formData->city = $validated['city'];
        $formData->postal_code = $validated['postal_code'];
        $formData->grama_name = $validated['grama_name'];
        $formData->gcontact_num = $validated['gcontact_num'];
        $formData->authorized_per_name = $validated['authorized_per_name'];
        $formData->authorized_per_num = $validated['authorized_per_num'];
        $formData->save();

        return redirect()->route('form.step4', $formData->id);
    }

     //start form 4
     public function step4($id)         
     {
         $formData = FormData::find($id);
         if (!$formData) {
             abort(404);
         }
 
         // Retrieve all input fields before Step 1, 2, and 3
         $step1Fields = ['name', 'email', 'address', 'contact_num', 'occupation'];
         $step2Fields = ['beaf', 'expect_soluation', 'photo', 'problem_level', 'suggestions'];
         $step3Fields = ['district', 'city', 'postal_code', 'grama_name', 'gcontact_num', 'authorized_per_name', 'authorized_per_num'];
         $previousData = [];
         foreach ($step1Fields as $field) {
             $previousData[$field] = $formData->{$field};
         }
         foreach ($step2Fields as $field) {
             $previousData[$field] = $formData->{$field};
         }
         foreach ($step3Fields as $field) {
             $previousData[$field] = $formData->{$field};
         }
 
         return view('form.step4', compact('formData', 'previousData'));
     }
 
     public function postStep4(Request $request)
     {
         $formData = FormData::find($request->input('id'));
         if (!$formData) {
             abort(404);
         }
 
         return redirect()->route('form.step4', $formData->id);
     }

     //Retrieve function
     public function FetchFormData(Request $request)
     {
         if ($request->ajax()) {
             $formData = FormData::select('id', 'name', 'email', 'address', 'contact_num','city','Status');
     
             if ($request->has('search') && !empty($request->input('search')['value'])) {
                 $searchValue = $request->input('search')['value'];
                 $formData->where(function ($query) use ($searchValue) {
                     $query->where('name', 'like', '%' . $searchValue . '%')
                         ->orWhere('email', 'like', '%' . $searchValue . '%')
                         // Add more columns as necessary for searching
                         ->orWhere('address', 'like', '%' . $searchValue . '%');
                 });
             }
     
             $formData = $formData->get();
     
             return datatables()->of($formData)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
                     $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
                     return $btn;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
     
         $formData = FormData::all();
     
         return view('user.dashboard', compact('formData'));
     }

     public function getUserData($id)
     {
         // Retrieve user data based on the ID
         $user = FormData::findOrFail($id);
 
         // Prepare the data to be sent as a JSON response
         $responseData = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'address' => $user->address,
            'contact_num' => $user->contact_num,
            'city' => $user->city,
            'beaf' => $user->beaf,
            'expect_soluation' => $user->expect_soluation,
            'photo' => $user->photo,
            'problem_level' => $user->problem_level,
            'suggestions' => $user->suggestions,
            'district' => $user->district,
            'postal_code' => $user->postal_code,
            'grama_name' => $user->grama_name,
            'gcontact_num' => $user->gcontact_num,
            'authorized_per_name' => $user->authorized_per_name,
            'authorized_per_num' => $user->authorized_per_num,
            'Status' => $user->Status,
         ];
 
         // Return the data as JSON
         return response()->json(['formData' => $responseData]);
     }

        //UPDATE USER PROJECT DETAILS
        public function edit($id)
            {
                $user = FormData::find($id);
                return response()->json([
                    'formData' => $user
                ]);
            }

            public function update(Request $request, $id)
            {
                $validatedData = $request->validate([
                    'name' => 'required',
                    'authorized_per_num' => 'required'
                    
                ]);

                $user = FormData::findOrFail($id);
                $user->name = $validatedData['name'];
                $user->authorized_per_num = $validatedData['authorized_per_num'];
                $user->save();

                return response()->json(['message' => 'User updated successfully']);
            }

    //DELETE FUNCTION
    public function delete($id)
    {
        $user = FormData::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    //UPDATE STATUS
    public function updateStatus(Request $request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:Approved,Rejected',
        ]);

        $user = FormData::findOrFail($id);
        $user->Status = $validatedData['status'];
        $user->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    //USER INQUIRY 
    public function inquiry(Request $request){
        return view ('inquiry');
    }

}