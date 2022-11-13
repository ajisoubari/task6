<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Dotenv\Util\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = date('Y-m-d H:i:s');

        $student = new Student();

        $check = Student::where('nama', $request->nama)->first();

        if ($request->nama == null || $request->nim == null || $request->email == null || $request->jurusan == null) {
            $data = [
                'message' => 'Parameter tidak ditemukan!!'
            ];

            return response()->json($data);
        }
        
        if ($check != null) {
            $data = [ 
                'message' => 'nama sudah ada!!'
            ];
        } else {
            $student->nama = $request->nama; 
            $student->nim = $request->nim;
            $student->email = $request->email;
            $student->jurusan = $request->jurusan;
            $student->created_at = $timestamp;
            $student->save();
            
            $data = [
                'message' => 'data student berhasil dibuat',
                'data' => $student
            ];
        }

        return response()->json($data, 201);
    }

    public function show(Request $request, $id)
    {
        if (!is_numeric($id)) {
            $data = [
                'message' => 'Data harus berupa nomor!!'
            ];

            return response()->json($data, 503);
        }

        $show = Student::where('id', $id)->first();
        if ($show == null) {
            $data = [
                'messege' => 'Data student tidak ada!!'
            ];

            return response()->json($data);
        } else {
            return response()->json($show);
        }
    }

    public function update(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $timestamp = date('Y-m-d H:i:s');

        $doChange = Student::where('id', $request->id)->first();

        if ($doChange == null) {
            $data = [
                'message' => 'Sorry, data student yang di update tidak ada!!'
            ];

            return response()->json($data, 404);
        }

        $doChange->nama = $request->nama != null ? $request->nama : $doChange->nama;
        $doChange->nim = $request->nim != null ? $request->nim : $doChange->nim;
        $doChange->email = $request->email != null ? $request->email : $doChange->email;
        $doChange->jurusan = $request->jurusan != null ? $request->jurusan : $doChange->jurusan;
        $doChange->updated_at = $timestamp;
        $doChange->save();

        $message = [
            'message' => 'Update data student berhasil!',
            'data' => $doChange
        ];

        return response()->json($message, 201);
    }

    public function destroy(Request $request)
    {
        $delete = Student::where('id', $request->id)->first();
        
        if ($delete == null) {
            $data = [
                'message' => 'data yang di hapus tidak ada!!'
            ];

            return response()->json($data, 404);
        }

        $delete->delete();

        $message = [
            'message' => 'Delete data student sukses',
            'data' => $delete
        ];

        return response()->json($message, 200);
    }
}
