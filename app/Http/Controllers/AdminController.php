<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Auth;
use App\Models\Report;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;
use Dompdf\Options;
class AdminController extends Controller
{
    public function Index(){
        return view('admin.admin_login');
    }

    public function Dashboard(){
        return view('admin.index');
    }

   public function Login(Request $request){
    
    $check = $request ->all();
    if(Auth::guard('admin')->attempt(['email'=> $check['email'],'password'=>$check['password'] ])){
        return redirect()->route('admin.dashboard')->with('error','Admin Login Successfully');
    }else{
        return back()->with('error','Invalid Email or Password');
    
    }
    
    }

    public function AdminLogout(){
        Auth::guard('admin')->logout();
        return redirect()->route('login_from')->with('error','Admin Logout Successfully');
   }

   public function list(Request $request){
       $list = Report::get();
       return view('admin.Reportlist',compact('list'));
   }
   public function remove($id){
    Report::find($id)->delete();
    return redirect()->route('admin.dashboard');
}
   
   public function AdminRegister(){
    return view ('admin.admin_register');
   
}
    public function AdminRegisterCreate (Request $request){
        Admin::insert([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'created_at'=> Carbon::now(),
       ]);
       return redirect()->route('login_from')->with('error','Admin Registered Successfully');
    }
    public function createPDF ($id) {
        // Retrieve all products from the db
         $reports = Report::find($id);
         require_once base_path('vendor/autoload.php');

         $imagePath =  public_path('assets/img/PNP-Logo.png');
         
        
       

    if (!$reports) {
        // Handle if the row doesn't exist
        return response()->json(['error' => 'Row not found'], 404);
    }

    // Load the PDF template
    $html = view('pdfview', compact('reports'))->render();

    // Instantiate Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $dompdf = new Dompdf($options);

    // Load HTML content into Dompdf
    $dompdf->loadHtml($html);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF (inline)
    return $dompdf->stream("Report.pdf");

       
    }

    
}

