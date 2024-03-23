<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;
use Exception;

class DeleteController extends Controller
{
   public function delete($id){
      try {
         //code...

         info('info masszeee'.$id);

         $check = Personal::where('id', $id)->first();

         if(!$check){
            response()->json(json_encode("Person not found"), 404);
         }


         Personal::where('id', $id)->delete();

      } catch (Exception $err) {
         return response()->json(json_encode($err), 500);
      }
   }
}