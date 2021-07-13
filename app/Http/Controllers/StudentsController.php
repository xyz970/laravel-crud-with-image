<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class StudentsController extends Controller
{

    /**
     * Students Data
     * @return JsonData
     */
    public function data()
    {
        $data = Student::all();
        // return ['data'=>$data];
        return response()->json(['data' => $data]);
    }

    public function search($keyword)
    {
        $data = Student::query()->where('nisn','LIKE','%'.$keyword.'%')->orWhere( 'name','LIKE','%'.$keyword.'%')->orWhere('pob','LIKE','%'.$keyword.'%')
            ->orWhere('email','LIKE','%'.$keyword.'%')->orWhere('dob','LIKE','%'.$keyword.'%')
            ->get();
            return response()->json(['data'=>$data]);
    }

    /**
     * Insert Form
     */

    public function showInsertForm()
    {
        return view('insert');
    }

    /**
     * Update Form
     */

    public function showUpdateForm($nisn)
    {
        $student = Student::find($nisn);
        // dd($student);
        return view('update', compact('student'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('data');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postStore(Request $request)
    {
        $input = $request->only(['nisn', 'email', 'dob', 'pob', 'photo', 'name']);
        $tempExt = pathinfo(public_path('assets/img/temporary/') . $input['photo'], PATHINFO_EXTENSION);
        $filename = $input['nisn'] . '.' . $tempExt;
        $student = new Student;
        $student['nisn'] = $input['nisn'];
        $student['email'] = $input['email'];
        $student['dob'] = $input['dob'];
        $student['pob'] = $input['pob'];
        $student['name'] = $input['name'];
        if ($request->has('photo')) {
            $student['photo'] = $filename;
            rename(public_path('assets/img/temporary/') . $input['photo'], public_path('assets/img/students-photo/') . $filename,);
        }
        $student->save();

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('/');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $nisn
     * @return \Illuminate\Http\Response
     */
    public function postUpdate(Request $request, $nisn)
    {
        $input = $request->only(['nisn', 'email', 'dob', 'pob', 'photo', 'name']);
        $student = Student::find($nisn);
        $student['nisn'] = $input['nisn'];
        $student['email'] = $input['email'];
        $student['dob'] = $input['dob'];
        $student['pob'] = $input['pob'];
        $student['name'] = $input['name'];
        if ($request->has('photo')) {
            $tempExt = pathinfo(public_path('assets/img/temporary/') . $input['photo'], PATHINFO_EXTENSION);
            $filename = $input['nisn'] . '.' . $tempExt;
            $student['photo'] = $filename;
            rename(public_path('assets/img/temporary/') . $input['photo'], public_path('assets/img/students-photo/') . $filename,);
        }
        $student->save();

        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function getDelete($nisn)
    {
        $student = Student::find($nisn);
        unlink(public_path('assets/img/students-photo/').$student->photo );
        $student->delete();
        Alert::success('Berhasil', 'Data berhasil dihapus');
        return redirect('/');   
    }
}
