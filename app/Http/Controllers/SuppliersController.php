<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests;
use Session;

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
      return redirect()->back();
   }


//method to only display the update page
   public function showupdatepage(Supplier $supplier)
   {
      $updated = Supplier::where('id','=',$supplier->id)->get();

     //dd($updatepage);
      return view('suppliers.showupdatepage', compact('updated'));
   }
   
   public function UpdateSupplier(Request $request)
   {
   

      $updatesupplier = Supplier::where('id','=',$request->input('id'))->update(['suppliername'=>$request->input('name'),
          'supplieraddress'=>$request->input('address')]);
      return redirect()->action('SuppliersController@index');


   }

   public function delete($id)
   {
      $deleteSupplier = Supplier::where('id','=',$id)->delete($id);
     // $deleteSupplier->delete();
     // dd($deleteSupplier);
         return redirect()->action('SuppliersController@index');
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
