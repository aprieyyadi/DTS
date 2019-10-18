<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
   public function index()
   {
   	return view('index');
   }

   public function master()
   {
    return view('master');
   }

   public function daftar()
   {
   	return view('daftar');
   }
}
