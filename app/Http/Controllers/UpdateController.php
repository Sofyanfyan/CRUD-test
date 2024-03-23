<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Exception;

class UpdateController extends Controller
{
   public function index($id){
      try {
         //code...
         $data = Personal::with('family')->where('id', $id)->first();

         if(!$data){
            return "<h1>Data Not Found</h1>";
         }

         return view('components.edit-applicant')->with('data', $data);

      } catch (Exception $err) {
         
         return abort(500);
      }
   }


   public function action(Request $request, $id){
      DB::beginTransaction();
      try {
         //code...

         $personal = [
            "posisi_lamaran"=> $request->posisi_lamaran,
            "nama_lengkap"=> $request->nama_lengkap,
            "nama_panggilan"=> $request->nama_panggilan,
            "tempat_tanggal_lahir"=> $request->tempat_tanggal_lahir,
            "jenis_kelamin"=> $request->jenis_kelamin? strtolower($request->jenis_kelamin) : $request->jenis_kelamin,
            "kebangsaan"=> $request->kebangsaan,
            "agama"=> $request->agama,
            "pendidikan_terakhir"=> $request->pendidikan_terakhir,
            "jurusan"=> $request->jurusan,
            "sekolah"=> $request->sekolah,
            "ipk"=> $request->ipk,
            "alamat_terakhir"=> $request->alamat_terakhir,
         ];

         $family = [
            "kawin"=> $request->kawin == "Sudah"? true : false ,
            "jml_saudara_kandung"=> $request->jml_saudara_kandung,
            "jml_anak"=> $request->jml_anak,
            "nama_ayah"=> $request->nama_ayah,
            "nama_ibu"=> $request->nama_ibu,
            "pekerjaan_ayah"=> $request->pekerjaan_ayah,
            "pekerjaan_ibu"=> $request->pekerjaan_ibu,
         ];


         $validator = Validator::make(array_merge($personal, $family), [
            "posisi_lamaran"=> 'required|string' ,
            "nama_lengkap"=> 'required|string' ,
            "nama_panggilan"=> 'required|string' ,
            "tempat_tanggal_lahir"=> 'required|string',
            "jenis_kelamin"=> 'required|string|in:pria,wanita',
            "kebangsaan"=> 'required|string',
            "agama"=> 'required|string',
            "pendidikan_terakhir"=> 'required|string',
            "jurusan"=> 'required|string',
            "sekolah"=> 'required|string',
            "ipk"=> 'required|numeric|between:0,100',
            "alamat_terakhir"=> 'required|string',
            "kawin"=> "required|boolean" ,
            "jml_saudara_kandung"=> 'required|integer',
            "jml_anak"=> 'required|integer',
            "nama_ayah"=> 'required|string',
            "nama_ibu"=> 'required|string',
            "pekerjaan_ayah"=> 'required|string',
            "pekerjaan_ibu"=> 'required|string',
         ]);


         if($validator->fails())
         {
            DB::rollBack();
            return redirect('/update/'.$id)->withErrors($validator->messages())->withInput($request->all());
         }


         $personal = Personal::where('id', $id)->update($personal);
         $person = Personal::where('id', $id)->first();
         Family::where('id', $person->family_id)->update($family);
         DB::commit();
         session()->flash('after_create');
         return redirect('/');

      } catch (Exception $err) {
         return dd($err);
      }
   }
}