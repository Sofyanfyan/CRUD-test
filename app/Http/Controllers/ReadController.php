<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Exception;
use Illuminate\Http\Request;

class ReadController extends Controller
{
    public function showTable(){

      try {
         //code...
         $data = Personal::get();
         // return $data;
         return view('components.home')->with('data', $data);
      } catch (Exception $err) {
         return dd($err);
      }
   }
    }