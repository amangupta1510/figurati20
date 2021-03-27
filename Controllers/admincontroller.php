<?php

namespace App\Http\Controllers;
use Validator;
use Response;
use File;
use Auth;
use Storage;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\http\Requests;
use Illuminate\Http\Request;
use App\admin;
use App\distributer;
use App\enquiry;
use App\lot_entry;
use App\product;
use App\order;
use DB;
use Geographical;
use Image;
use Excel;
use Carbon\Carbon;
use DateTime;

class admincontroller extends Controller
{ 
  /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
      $products = product::where(['active'=>'1'])->orderBy('id', 'DESC')->paginate(10);
      return view('admin.dashboard',compact('products'));
    }

    public function profile(){
      return view('admin.profile');
    }

    public function edit_profile_submit(Request $request){
      $profile = admin::find(Auth::user()->id);
      $profile->username = $request->username;
      $profile->name = $request->name;
      $profile->email = $request->email;
      $profile->contact = $request->contact;
      $profile->address = $request->address;
      $profile->save();
      return redirect()->route('admin-dashboard');
    }

    public function change_password(){
      return view('admin.change_password');
    }

    public function change_password_submit(Request $request){  
      $old = Auth::user()->password;
      if(Hash::check($request->oldpassword,$old)){ 
            $inv = admin::where('id',Auth::user()->id)->update(['password'=> Hash::make($request->password2)]);
            return redirect()->route('admin-dashboard');
       }
       else{
       return back();
       }
    }

    public function product(){
      $products = product::where(['active'=>'1'])->orderBy('id', 'DESC')->paginate(10);
      return view('admin.product',compact('products'));
    }

    public function add_product(){
      return view('admin.add_product');
    }

    public function add_product_submit(Request $request){

     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().uniqid(rand()).'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path().'/public_html/images';
        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(160, 150);
        $image_resize->save(base_path().'/public_html/images/'.$name);
        $img='images/'.$name; 
      }
      else{
        $img='images/basic_product.png';
      }
                  $file = new product();
                  $file->name = $request->name;
                  $file->description=$request->description;
                  $file->available_unit=0;
                  $file->sold_unit=0;
                  $file->mrp=$request->mrp;
                  $file->discount=$request->discount;
                  $file->price=$request->price;
                  $file->image=$img;
                  $file->active=1;
                  $file->save();
                return redirect()->route('admin-product');
    }

    public function edit_product(Request $request){
      $data = product::where(['id'=>$request->get('id'),'active'=>'1'])->get();
      return view('admin.edit_product',compact('data'));
    }

    public function edit_product_submit(Request $request){

     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().uniqid(rand()).'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path().'/public_html/images';
        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(160, 150);
        $image_resize->save(base_path().'/public_html/images/'.$name);
        $img='images/'.$name; 

                  $file = product::find($request->id);
                  $file->name = $request->name;
                  $file->description=$request->description;
                  $file->mrp=$request->mrp;
                  $file->discount=$request->discount;
                  $file->price=$request->price;
                  $file->image=$img;
                  $file->active=1;
                  $file->save();
      }
      else{
      
                  $file = product::find($request->id);
                  $file->name = $request->name;
                  $file->description=$request->description;
                  $file->mrp=$request->mrp;
                  $file->discount=$request->discount;
                  $file->price=$request->price;
                  $file->active=1;
                  $file->save();
       }
       $file = order::where('p_id',$request->id)->update(['p_name'=>$request->name]);
       $file = lot_entry::where('p_id',$request->id)->update(['p_name'=>$request->name]);

     return redirect()->route('admin-product');
    }

    public function delete_product(Request $request){
      $data = product::where(['id'=>$request->get('id'),'active'=>'1'])->update(['active'=>0]);
      return back();
    }

    public function distributer(Request $request){
       if($request->has('s')&&$request->get('s')!=''){
           $search = $request->get('s');
         $distributers = distributer::where('name', 'like', '%'.$search.'%')
           ->orWhere('address', 'like', '%'.$search.'%')
           ->orWhere('email', 'like', '%'.$search.'%')
           ->orWhere('contact', 'like', '%'.$search.'%');
           $distributers = $distributers->where(['active'=>'1'])->orderBy('id', 'desc')->paginate(10);
           return view('admin.distributer',compact('distributers'));
          }
          else{  
            $distributers = distributer::where(['active'=>'1'])->orderBy('id', 'DESC')->paginate(10);
           return view('admin.distributer',compact('distributers'));
        }
    }
  
    public function add_distributer(){
      return view('admin.add_distributer');
    }

    public function add_distributer_submit(Request $request){

     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().uniqid(rand()).'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path().'/public_html/images';
        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(160, 150);
        $image_resize->save(base_path().'/public_html/images/'.$name);
        $img='images/'.$name; 
      }
      else{
        $img='images/basic_distributor.png';
      }
                  $file = new distributer();
                  $file->name = $request->name;
                  $file->email=$request->email;
                  $file->contact=$request->contact;
                  $file->address=$request->address;
                  $file->purchase_unit=0;
                  $file->active=1;
                  $file->image=$img;
                  $file->save();
                return redirect()->route('admin-distributer');
    }

    public function edit_distributer(Request $request){
      $data = distributer::where(['id'=>$request->get('id'),'active'=>'1'])->get();
      return view('admin.edit_distributer',compact('data'));
    }

    public function edit_distributer_submit(Request $request){

     if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name = time().uniqid(rand()).'.'.$image->getClientOriginalExtension();
        $destinationPath = base_path().'/public_html/images';
        $image_resize = Image::make($image->getRealPath());              
        $image_resize->resize(160, 150);
        $image_resize->save(base_path().'/public_html/images/'.$name);
        $img='images/'.$name; 

                  $file = distributer::find($request->id);
                  $file->name = $request->name;
                  $file->email=$request->email;
                  $file->contact=$request->contact;
                  $file->address=$request->address;
                  $file->active=1;
                  $file->image=$img;
                  $file->save();
      }
      else{
      
                  $file = distributer::find($request->id);
                  $file->name =$request->name;
                  $file->email=$request->email;
                  $file->contact=$request->contact;
                  $file->address=$request->address;
                  $file->active=1;
                  $file->save();
       }
       $file = order::where('d_id',$request->id)->update(['d_name'=>$request->name,'d_email'=>$request->email,'d_contact'=>$request->contact,'d_address'=>$request->address]);
     return redirect()->route('admin-distributer');
    }

    public function delete_distributer(Request $request){
      $data = distributer::where(['id'=>$request->get('id'),'active'=>'1'])->update(['active'=>0]);
      return back();
    }


    public function lot(){
      $lots = lot_entry::where(['active'=>'1'])->orderBy('id', 'DESC')->paginate(10);
      return view('admin.lot',compact('lots'));
    }

    public function add_lot(){
      $products = product::where(['active'=>'1'])->select('id','name','image','mrp','discount','price')->get();
      return view('admin.add_lot',compact('products'));
    }

    public function add_lot_submit(Request $request){

       $file = new lot_entry();
       $file->p_id = $request->p_id;
       $file->p_name=$request->p_name;
       $file->lot_no=$request->lot_no;
       $file->unit=$request->unit;
       $file->sold_unit=0;
       $file->remain_unit=$request->unit;
       $file->entry_time=$request->entry_time;
       $file->description=$request->description;
       $file->lot_mrp=$request->lot_mrp;
       $file->lot_discount=$request->lot_discount;
       $file->lot_price=$request->lot_price;
       $file->active=1;
       $file->save();
       $file = product::find($request->p_id);
       $file->available_unit = $file->available_unit + $request->unit;
       $file->save();
       return redirect()->route('admin-lot');
    }

    public function edit_lot(Request $request){
      $products = product::where(['active'=>'1'])->select('id','name','image','mrp','discount','price')->get();
      $data = lot_entry::where(['id'=>$request->get('id'),'active'=>'1'])->get();
      return view('admin.edit_lot',compact('data','products'));
    }

    public function edit_lot_submit(Request $request){

       $files = product::find($request->p_id);
       
       $file = lot_entry::find($request->id);
       $file->p_id = $request->p_id;
       $file->p_name=$request->p_name;
       $file->lot_no=$request->lot_no;
       $file->unit=$request->unit;
       $files->available_unit = $files->available_unit - $file->remain_unit + $request->remain_unit;
       $files->sold_unit = $files->sold_unit - $file->sold_unit + $request->sold_unit;
       $file->sold_unit=$request->sold_unit;
       $file->remain_unit=$request->remain_unit;
       $file->entry_time=$request->entry_time;
       $file->description=$request->description;
       $file->lot_mrp=$request->lot_mrp;
       $file->lot_discount=$request->lot_discount;
       $file->lot_price=$request->lot_price;
       $file->save();
       $files->save();
        $file = order::where('lot_id',$request->id)->update(['lot_no'=>$request->lot_no]);
      return redirect()->route('admin-lot');
    }

    public function delete_lot(Request $request){
      $data = lot_entry::find($request->get('id'));
      $files = product::find($data->p_id);
      $files->available_unit = $files->available_unit - $data->remain_unit;
      $files->sold_unit = $files->sold_unit - $data->sold_unit;
      $data->active=0;
      $data->save();
      $files->save();
      return back();
    }


    public function order(){
      $orders = order::where(['active'=>'1'])->orderBy('id', 'DESC')->paginate(10);
      return view('admin.order',compact('orders'));
    }

    public function add_order(){
      $products = product::where(['active'=>'1'])->select('id','name','image','mrp','discount','price')->get();
      $distributers = distributer::where(['active'=>'1'])->get();
      return view('admin.add_order',compact('products','distributers'));
    }

    public function get_lot(Request $request){
      $lot = lot_entry::where(['p_id'=>$request->get('id'),'active'=>'1'])->get();
      return Response::json($lot);
    }
    public function add_order_submit(Request $request){

       $file = new order();
       $file->order_no = 'FIG'.date("ymdHis");
       $file->p_id = $request->p_id;
       $file->p_name=$request->p_name;
       $file->lot_id=$request->lot_id;
       $file->lot_no=$request->lot_no;
       $file->d_id = $request->d_id;
       $file->d_name = $request->d_name;
       $file->d_email=$request->d_email;
       $file->d_contact=$request->d_contact;
       $file->d_address=$request->d_address;
       $file->unit_mrp=$request->unit_mrp;
       $file->unit_discount=$request->unit_discount;
       $file->unit_price=$request->unit_price;
       $file->total_mrp=$request->total_mrp;
       $file->total_discount=$request->total_discount;
       $file->special_discount=$request->special_discount;
       $file->total_price=$request->total_price;
       $file->completed_payment=$request->completed_payment;
       $file->due_payment=$request->due_payment;
       $file->total_unit=$request->total_unit;
       $file->selling_time=$request->selling_time;
       $file->payment_method=$request->payment_method;
       $file->payment_status=$request->payment_status;
       $file->active=1;
       $file->save();

       $file = lot_entry::find($request->lot_id);
       $file->sold_unit = $file->sold_unit + $request->total_unit;
       $file->remain_unit = $file->unit - $file->sold_unit;
       $file->save();

       $file = distributer::find($request->d_id);
       $file->purchase_unit = $file->purchase_unit + $request->total_unit;
       $file->save();

       $file = product::find($request->p_id);
       $file->sold_unit = $file->sold_unit + $request->total_unit;
       $file->available_unit = $file->available_unit - $request->total_unit;
       $file->save();
       return redirect()->route('admin-order');
    }

    public function edit_order(Request $request){
      $products = product::where(['active'=>'1'])->select('id','name','image','mrp','discount','price')->get();
      $distributers = distributer::where(['active'=>'1'])->get();
      $data = order::where(['id'=>$request->get('id'),'active'=>'1'])->get();
      foreach ($data as $dt) {
       $lots = lot_entry::where(['p_id'=>$dt->p_id,'active'=>'1'])->get();
      }
      return view('admin.edit_order',compact('data','products','distributers','lots'));
    }

    public function edit_order_submit(Request $request){

       $file = order::find($request->id);

       $files = lot_entry::find($file->lot_id);
       $files->sold_unit = $files->sold_unit - $file->total_unit;
       $files->remain_unit = $files->unit - $files->sold_unit;
       $files->save();

       $files = distributer::find($file->d_id);
       $files->purchase_unit = $files->purchase_unit - $file->total_unit;
       $files->save();

       $files = product::find($file->p_id);
       $files->sold_unit = $files->sold_unit - $file->total_unit;
       $files->available_unit = $files->available_unit + $file->total_unit;
       $files->save();

       $file->p_id = $request->p_id;
       $file->p_name=$request->p_name;
       $file->lot_id=$request->lot_id;
       $file->lot_no=$request->lot_no;
       $file->d_id = $request->d_id;
       $file->d_name = $request->d_name;
       $file->d_email=$request->d_email;
       $file->d_contact=$request->d_contact;
       $file->d_address=$request->d_address;
       $file->unit_mrp=$request->unit_mrp;
       $file->unit_discount=$request->unit_discount;
       $file->unit_price=$request->unit_price;
       $file->total_mrp=$request->total_mrp;
       $file->total_discount=$request->total_discount;
       $file->special_discount=$request->special_discount;
       $file->total_price=$request->total_price;
       $file->completed_payment=$request->completed_payment;
       $file->due_payment=$request->due_payment;
       $file->total_unit=$request->total_unit;
       $file->selling_time=$request->selling_time;
       $file->payment_method=$request->payment_method;
       $file->payment_status=$request->payment_status;
       $file->active=1;
       $file->save();

       $file = lot_entry::find($request->lot_id);
       $file->sold_unit = $file->sold_unit + $request->total_unit;
       $file->remain_unit = $file->unit - $file->sold_unit;
       $file->save();

       $file = distributer::find($request->d_id);
       $file->purchase_unit = $file->purchase_unit + $request->total_unit;
       $file->save();

       $file = product::find($request->p_id);
       $file->sold_unit = $file->sold_unit + $request->total_unit;
       $file->available_unit = $file->available_unit - $request->total_unit;
       $file->save();

       
       return redirect()->route('admin-order');
    }

    public function delete_order(Request $request){
      $file = order::find($request->id);

       $files = lot_entry::find($file->lot_id);
       $files->sold_unit = $files->sold_unit - $file->total_unit;
       $files->remain_unit = $files->unit - $files->sold_unit;
       $files->save();

       $files = distributer::find($file->d_id);
       $files->purchase_unit = $files->purchase_unit - $file->total_unit;
       $files->save();

       $files = product::find($file->p_id);
       $files->sold_unit = $files->sold_unit - $file->total_unit;
       $files->available_unit = $files->available_unit + $file->total_unit;
       $files->save();

       $file->active=0;
       $file->save();
      return back();
    }

    public function balance_sheet(Request $request){

      return view('admin.balance_sheet');
    }
    public function product_details(Request $request){

      return view('admin.product_details');
    }
    public function distributer_details(Request $request){

      return view('admin.distributer_details');
    }
    public function lot_details(Request $request){

      return view('admin.lot_details');
    }

     public function balance_sheet_load(Request $request){
      if($request->get('type')=='all'){
      $orders = order::where(['active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $orders = order::where(['active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $orders = order::where(['active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
      return Response::json($orders);
    }




    public function product_details_load(Request $request){
      if($request->get('type')=='all'){
      $orders = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
           $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $orders = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $orders = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
      return Response::json($orders);
    }



    public function distributer_details_load(Request $request){
      if($request->get('type')=='all'){
      $orders = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $orders = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $orders = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
      return Response::json($orders);
    }




    public function lot_details_load(Request $request){
      if($request->get('type')=='all'){
      $orders = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $orders = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $orders = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
      return Response::json($orders);
    }




    public function export_balance_sheet(Request $request){

      if($request->get('type')=='all'){
      $data = order::where(['active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $data = order::where(['active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $data = order::where(['active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }

      $data_array[] = array('S.No.','Order No.','Batch No.','Product name','Distributer','Contact','Email','Quantity','MRP','Discount','Extra Discount','Total Price','Paid Amount','Due Amount','Method','Payment','Selling Time');
         $no=1; $mrp=0; $discount=0; $spl_discount=0; $price=0;$completed=0; $due=0;$quantity=0;
      foreach($data as $dt){
       $data_array[] = array('S.No.' => $no++,'Order No.' => $dt->order_no,'Batch No.' => $dt->lot_no,'Product name' => $dt->p_name,'Distributer' => $dt->d_name,'Contact' => $dt->d_contact,'Email' => $dt->d_email,'Quantity' => $dt->total_unit.' units','MRP' => '₹'.$dt->total_mrp,'Discount' => '₹'.$dt->total_discount,'Extra Discount' => '₹'.$dt->special_discount,'Total Price' => '₹'.$dt->total_price,'Paid Amount'=>'₹'.$dt->completed_payment,'Due Amount'=>'₹'.$dt->due_payment,'Method' => $dt->payment_method,'Payment' => $dt->payment_status,'Selling Time' => $dt->selling_time);

       $completed=$completed+$dt->completed_payment;
       $due=$due+$dt->due_payment;
       $quantity=$quantity+$dt->total_unit;


       $mrp=$mrp+$dt->total_mrp;$discount=$discount+$dt->total_discount;$spl_discount=$spl_discount+$dt->special_discount;$price=$price+$dt->total_price;
      }
      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'','MRP'=>'','Discount'=>'','Extra Discount'=>'','Total Price'=>'','Paid Amount'=>'','Due Amount'=>'','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'Total Quantity','MRP'=>'Total MRP','Discount'=>'Discount','Extra Discount'=>'Extra Discount','Total Price'=>'Total Price','Paid Amount'=>'Paid Amount','Due Amount'=>'Due Amount','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>$quantity.' units','MRP'=>'₹'.$mrp,'Discount'=>'₹'.$discount,'Extra Discount'=>'₹'.$spl_discount,'Total Price'=>'₹'.$price, 'Paid Amount'=>'₹'.$completed,'Due Amount'=>'₹'.$due,'Method'=>'','Payment'=>'','Selling Time'=>'');

      Excel::create('Balance Sheet', function($excel) use ($data_array){
        $excel->setTitle('Balance Sheet');
        $excel->sheet('Balance Sheet', function($sheet) use ($data_array){
          $sheet->fromArray($data_array, null, 'A1', false, false);
        });
      })->download('xlsx');
    } 

    public function export_product_details(Request $request){

      if($request->get('type')=='all'){
      $data = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $data = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $data = order::where(['p_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
        
      $data_array[] = array('S.No.','Order No.','Batch No.','Product name','Distributer','Contact','Email','Quantity','MRP','Discount','Extra Discount','Total Price','Paid Amount','Due Amount','Method','Payment','Selling Time');
         $no=1; $mrp=0; $discount=0; $spl_discount=0; $price=0;$completed=0; $due=0;$quantity=0;
      foreach($data as $dt){
       $data_array[] = array('S.No.' => $no++,'Order No.' => $dt->order_no,'Batch No.' => $dt->lot_no,'Product name' => $dt->p_name,'Distributer' => $dt->d_name,'Contact' => $dt->d_contact,'Email' => $dt->d_email,'Quantity' => $dt->total_unit.' units','MRP' => '₹'.$dt->total_mrp,'Discount' => '₹'.$dt->total_discount,'Extra Discount' => '₹'.$dt->special_discount,'Total Price' => '₹'.$dt->total_price,'Paid Amount'=>'₹'.$dt->completed_payment,'Due Amount'=>'₹'.$dt->due_payment,'Method' => $dt->payment_method,'Payment' => $dt->payment_status,'Selling Time' => $dt->selling_time);

       $completed=$completed+$dt->completed_payment;
       $due=$due+$dt->due_payment;
       $quantity=$quantity+$dt->total_unit;


       $mrp=$mrp+$dt->total_mrp;$discount=$discount+$dt->total_discount;$spl_discount=$spl_discount+$dt->special_discount;$price=$price+$dt->total_price;
      }
      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'','MRP'=>'','Discount'=>'','Extra Discount'=>'','Total Price'=>'','Paid Amount'=>'','Due Amount'=>'','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'Total Quantity','MRP'=>'Total MRP','Discount'=>'Discount','Extra Discount'=>'Extra Discount','Total Price'=>'Total Price','Paid Amount'=>'Paid Amount','Due Amount'=>'Due Amount','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>$quantity.' units','MRP'=>'₹'.$mrp,'Discount'=>'₹'.$discount,'Extra Discount'=>'₹'.$spl_discount,'Total Price'=>'₹'.$price, 'Paid Amount'=>'₹'.$completed,'Due Amount'=>'₹'.$due,'Method'=>'','Payment'=>'','Selling Time'=>'');

      Excel::create('Product Balance Sheet', function($excel) use ($data_array){
        $excel->setTitle('Product Balance Sheet');
        $excel->sheet('Product Balance Sheet', function($sheet) use ($data_array){
          $sheet->fromArray($data_array, null, 'A1', false, false);
        });
      })->download('xlsx');
    }







    public function export_distributer_details(Request $request){

      if($request->get('type')=='all'){
      $data = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $data = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $data = order::where(['d_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
        
      $data_array[] = array('S.No.','Order No.','Batch No.','Product name','Distributer','Contact','Email','Quantity','MRP','Discount','Extra Discount','Total Price','Paid Amount','Due Amount','Method','Payment','Selling Time');
         $no=1; $mrp=0; $discount=0; $spl_discount=0; $price=0;$completed=0; $due=0;$quantity=0;
      foreach($data as $dt){
       $data_array[] = array('S.No.' => $no++,'Order No.' => $dt->order_no,'Batch No.' => $dt->lot_no,'Product name' => $dt->p_name,'Distributer' => $dt->d_name,'Contact' => $dt->d_contact,'Email' => $dt->d_email,'Quantity' => $dt->total_unit.' units','MRP' => '₹'.$dt->total_mrp,'Discount' => '₹'.$dt->total_discount,'Extra Discount' => '₹'.$dt->special_discount,'Total Price' => '₹'.$dt->total_price,'Paid Amount'=>'₹'.$dt->completed_payment,'Due Amount'=>'₹'.$dt->due_payment,'Method' => $dt->payment_method,'Payment' => $dt->payment_status,'Selling Time' => $dt->selling_time);

       $completed=$completed+$dt->completed_payment;
       $due=$due+$dt->due_payment;
       $quantity=$quantity+$dt->total_unit;


       $mrp=$mrp+$dt->total_mrp;$discount=$discount+$dt->total_discount;$spl_discount=$spl_discount+$dt->special_discount;$price=$price+$dt->total_price;
      }
      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'','MRP'=>'','Discount'=>'','Extra Discount'=>'','Total Price'=>'','Paid Amount'=>'','Due Amount'=>'','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'Total Quantity','MRP'=>'Total MRP','Discount'=>'Discount','Extra Discount'=>'Extra Discount','Total Price'=>'Total Price','Paid Amount'=>'Paid Amount','Due Amount'=>'Due Amount','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>$quantity.' units','MRP'=>'₹'.$mrp,'Discount'=>'₹'.$discount,'Extra Discount'=>'₹'.$spl_discount,'Total Price'=>'₹'.$price, 'Paid Amount'=>'₹'.$completed,'Due Amount'=>'₹'.$due,'Method'=>'','Payment'=>'','Selling Time'=>'');

      Excel::create('Distributer Balance Sheet', function($excel) use ($data_array){
        $excel->setTitle('Distributer Balance Sheet');
        $excel->sheet('Distributer Balance Sheet', function($sheet) use ($data_array){
          $sheet->fromArray($data_array, null, 'A1', false, false);
        });
      })->download('xlsx');
    }








    public function export_lot_details(Request $request){

      if($request->get('type')=='all'){
      $data = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->get();
        }else if($request->get('type')=='month'){
          $start = new DateTime();$start->modify('-6 month'); $start=$start->format('Y-m-d');
          $end = new DateTime();$end=$end->format('Y-m-d');
         $data = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$start." 00:00:00",$end." 23:59:59"])->get();
        }
        else{
          $data = order::where(['lot_id'=>$request->get('id'),'active'=>'1'])->whereBetween('created_at', [$request->get('start')." 00:00:00",$request->get('end')." 23:59:59"])->get();
        }
        
      $data_array[] = array('S.No.','Order No.','Batch No.','Product name','Distributer','Contact','Email','Quantity','MRP','Discount','Extra Discount','Total Price','Paid Amount','Due Amount','Method','Payment','Selling Time');
         $no=1; $mrp=0; $discount=0; $spl_discount=0; $price=0;$completed=0; $due=0;$quantity=0;
      foreach($data as $dt){
       $data_array[] = array('S.No.' => $no++,'Order No.' => $dt->order_no,'Batch No.' => $dt->lot_no,'Product name' => $dt->p_name,'Distributer' => $dt->d_name,'Contact' => $dt->d_contact,'Email' => $dt->d_email,'Quantity' => $dt->total_unit.' units','MRP' => '₹'.$dt->total_mrp,'Discount' => '₹'.$dt->total_discount,'Extra Discount' => '₹'.$dt->special_discount,'Total Price' => '₹'.$dt->total_price,'Paid Amount'=>'₹'.$dt->completed_payment,'Due Amount'=>'₹'.$dt->due_payment,'Method' => $dt->payment_method,'Payment' => $dt->payment_status,'Selling Time' => $dt->selling_time);

       $completed=$completed+$dt->completed_payment;
       $due=$due+$dt->due_payment;
       $quantity=$quantity+$dt->total_unit;


       $mrp=$mrp+$dt->total_mrp;$discount=$discount+$dt->total_discount;$spl_discount=$spl_discount+$dt->special_discount;$price=$price+$dt->total_price;
      }
      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'','MRP'=>'','Discount'=>'','Extra Discount'=>'','Total Price'=>'','Paid Amount'=>'','Due Amount'=>'','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>'Total Quantity','MRP'=>'Total MRP','Discount'=>'Discount','Extra Discount'=>'Extra Discount','Total Price'=>'Total Price','Paid Amount'=>'Paid Amount','Due Amount'=>'Due Amount','Method'=>'','Payment'=>'','Selling Time'=>'');

      $data_array[] = array('S.No.'=>'','Order No.'=>'','Batch No.'=>'','Product name'=>'','Distributer'=>'','Contact'=>'','Email'=>'','Quantity'=>$quantity.' units','MRP'=>'₹'.$mrp,'Discount'=>'₹'.$discount,'Extra Discount'=>'₹'.$spl_discount,'Total Price'=>'₹'.$price, 'Paid Amount'=>'₹'.$completed,'Due Amount'=>'₹'.$due,'Method'=>'','Payment'=>'','Selling Time'=>'');

      Excel::create('Lot Balance Sheet', function($excel) use ($data_array){
        $excel->setTitle('Lot Balance Sheet');
        $excel->sheet('Lot Balance Sheet', function($sheet) use ($data_array){
          $sheet->fromArray($data_array, null, 'A1', false, false);
        });
      })->download('xlsx');
    } 











}
