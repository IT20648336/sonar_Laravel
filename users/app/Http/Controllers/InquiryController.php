<?php

namespace App\Http\Controllers;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $inquiry = new Inquiry();

        $inquiry->name = $request->input('name');
        $inquiry->designation = $request->input('designation');
        $inquiry->inquiry = $request->input('inquiry');
        $inquiry->response = $request->input('response');

        $inquiry->save();
        return redirect()->back()->with('success', 'Inquiry submitted successfully.');
        
    }

    public function retrieve()
    {
        $inquiries = Inquiry::all();
        
        return view('inquiry.inquirylist', ['inquiries' => $inquiries]);
    }

    public function updateAction(Request $request)
    {
        $selectedInquiries = $request->input('action');

        foreach ($selectedInquiries as $inquiryId) {
            $inquiry = Inquiry::find($inquiryId);

            if ($inquiry) {
                $inquiry->action = true; // Update the 'action' column status
                $inquiry->save();
            }
        }

        return redirect()->back()->with('success', 'Inquiry actions updated successfully.');
    }
}
