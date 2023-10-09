<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetail;
use App\Models\PersonalDocument;

use DB;
use Exception; // Import the Exception class at the top of your file
class PersonalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['personaldetail']=PersonalDetail::get();
        return view('persoanldetail.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['document'] =DB::table('document_type')->get();
        return view('persoanldetail.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $personal = new PersonalDetail();
            $personal->first_name = $request->first_name;
            $personal->middle_name = $request->middle_name;
            $personal->last_name = $request->last_name;
            $personal->date_of_birth = $request->date_of_birth;
            $personal->gender = $request->gender;
            $personal->email = $request->email;
            $personal->mobile_no = $request->mobile_no;
            $personal->aadhaar_no = $request->aadhaar_no;
            $personal->address = $request->address;
            $personal->retirement_date = $request->retirement_date;
            $personal->live_photo= $request->live_photo;
            $personal->live_video= $request->live_video;
            $personal->save();        
            
         /** --- document--  **/
            $names  = request('document_type');
            $images = request()->file('document_path');    
            foreach($names as $i => $code) {
                if(isset($images[$i])) {
                    if($request->hasFile('document_path') && isset($images[$i])) {
                            $img_name =$images[$i]->getClientOriginalName();
                            $images[$i]->move('documents/PersonalDocuments/',$img_name);
                            $candidatedocument = new PersonalDocument([
                            'document_path' => "{$img_name}",
                            'document_type' => $names[$i],
                            'personal_detail_id'=> $personal->id,
                            'date_submited'=> Date('Y-m-d'),
                        ]);
                        $candidatedocument->save();
                    }
                }
            }
          /** --- document--  **/

            return to_route('personaldetail.index')->withSuccess('User Created Successfully');
           

        } catch (Exception $e) {
            // Handle the exception, e.g., log it or return an error response
            return response()->json(['error' => 'Unable to save personal detail data'], 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $personaldetail = PersonalDetail::find($id);
        $data['document_type'] =DB::table('document_type')->get();
        $data['personal_document'] = DB::table('personal_documents')->where('personal_detail_id',$id)->get();

        return view('persoanldetail.edit',compact('personaldetail'),$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
