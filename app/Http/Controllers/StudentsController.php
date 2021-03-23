<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\File;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('students.index', [
            'students' => Student::paginate(5), //8. feladat: Laravel pagination, 5/oldal
            'signs' => File::paginate(5),
            'username' => $user->name
        ]);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        request()->validate([ //7. feladat: Validálás Laravel Request validation-ön keresztül
           'first_name' =>  'required|min:3',
           'last_name' =>  'required|min:3',
           'age' =>  'required|max:3',
           'group' =>  'required|min:3',
           'sign' => 'image|mimes:jpeg,png,jpg,gif,svg',
           'street_name' =>  'required|min:3',
           'street_number' =>  'required|min:1|max:5',
           'zip' =>  'required|min:3|max:4',
           'city' =>  'required|min:3',
           'siblings_num' =>  'required|max:2',
        ]);

        $student = new Student();

        $student->first_name = request('first_name');
        $student->last_name = request('last_name');
        $student->group = request('group');
        $student->age = request('age');

        $student->save();

        if($request->sign) { // Ha van feltöltött kép, akkor lementjük id és first_name atrribútumokból létrehozott néven
            $file = new File();
            $file->student_id = $student->id;
            $signName = $student->id . '_' . $student->first_name . '.' . request()->sign->getClientOriginalExtension();
            Storage::disk('public_uploads')->putFileAs('signs/', $request->sign, $signName);
            $file->sign = $signName;
            $file->save();
        }

        $address = new Address();

        $address->student_id = $student->id;
        $address->street_name = request('street_name');
        $address->street_number = request('street_number');
        $address->zip = request('zip');
        $address->city = request('city');
        $address->siblings_num = request('siblings_num');

        $address->save();

        return redirect('students');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Student $student)
    {
        $address = Address::where('student_id', $student->id)->first();
        if(isset($address)){
            $address = Arr::except($address, ['id','student_id']);
            return view('students.edit', compact('student','address'));
        }
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        request()->validate([ //7. feladat: Validálás Laravel Request validation-ön keresztül
            'first_name' =>  'required|min:3',
            'last_name' =>  'required|min:3',
            'age' =>  'required|max:3',
            'group' =>  'required|min:3',
            'sign' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'street_name' =>  'required|min:3',
            'street_number' =>  'required|min:1|max:5',
            'zip' =>  'required|min:3|max:4',
            'city' =>  'required|min:3',
            'siblings_num' =>  'required|max:2',
        ]);

        $student->first_name = request('first_name');
        $student->last_name = request('last_name');
        $student->group = request('group');
        $student->age = request('age');

        $student->save();

        if($request->sign) { // csak akkor mentünk, ha van megadott fájl
            $file = File::where('student_id', $student->id)->first();

            if(!isset($file)){ //hibakezelés, ha esetleg nem lenne a diákhoz kép rendelve
                $file = new File();
                $file->student_id = $student->id;
            }

            $signName = $student->id . '_' . $student->first_name . '.' . request()->sign->getClientOriginalExtension();
            Storage::disk('public_uploads')->putFileAs('signs/', $request->sign, $signName);
            $file->sign = $signName;
            $file->save();
        }

        $address = Address::where('student_id', $student->id)->first();

        if(!isset($address)){ //hibakezelés, ha esetleg nem lenne a diákhoz cím rendelve
            $address = new Address();
            $address->student_id = $student->id;
        }

        $address->street_name = request('street_name');
        $address->street_number = request('street_number');
        $address->zip = request('zip');
        $address->city = request('city');
        $address->siblings_num = request('siblings_num');

        $address->save();

        return redirect('students');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('students');
    }

    public function studentJson($id){ // 9/c feladat: 1 diák lekérése Json response válasszal, összes DB infóval
        $student = Student::find($id)->firstOrFail();

        $sign = File::where('student_id', $student->id)->firstOrFail();
        $address = Address::where('student_id', $student->id)->firstOrFail();
        unset( // szükségtelen/egyértelmű adatokat unseteljük
            $sign->id,
            $sign->student_id,
            $sign->created_at,
            $sign->updated_at,
            $address->id,
            $address->student_id,
            $address->created_at,
            $address->updated_at
        );

        return json_encode(array_merge($student->toArray(), $sign->toArray(), $address->toArray()));
    }
}
