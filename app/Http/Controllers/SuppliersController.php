<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SuppliersController extends Controller
{
   protected $supplierRepository;
   
   public function __construct()
   {
	  //Middleware 
	 $this->middleware('');
   }
   
   public function supplier()
   {
	   $supplier = $this->supplierRepository->create
   }
}
