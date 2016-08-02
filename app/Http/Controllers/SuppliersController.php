<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests;

class SuppliersController extends Controller
{
   public function index()
   {
      $allsuppliers = $this->GetAllSuppliers();
      //dd($allsuppliers);
      return view('suppliers.index',compact('allsuppliers'));
   }
   public function displayCreatePage()
   {
      return view('suppliers.createsupplier');
   }
   public function saveSupplier(Request $request)
   {
      //$allfields = $request->all();

      $this->validate($request,[
         'name'=>'required',
         'address'=>'required'

         ]);
      $supplier = new Supplier;
    // $result = $supplier->create($request->all());
      $supplier->suppliername = $request->input('name');
      $supplier->supplieraddress = $request->input('address');
      $supplier->save();
   }


//method to only display the update page
   public function showupdatepage($id)
   {
      $updatepage =  Supplier::find($id);
      return view('supplier.showupdatepage', compact('updatepage'));
   }
   
   public function UpdateSupplier(Request $request,$id)
   {
	  $allinput = $request->all();
      $this->validate($request,[
         'suppliername',
         'supplieraddress',
      ]);

      $updatesupplier = $this->UpdateASupplier($allinput);
      dd($updatesupplier);
      return redirect()->action('SuppliersController@details');
   }


   /**
    * supplier DataAccess Methods
    */



   public function GetAllSuppliers()
   {
      $allsuppliers = Supplier::paginate(20);
      return $allsuppliers;
   }

   public function UpdateASupplier(Request $supplier)
   {
      $update = Supplier::update($supplier->all());
      return $update;
   }
}
