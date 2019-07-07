<?php

namespace App\Http\Controllers;

use App\basicInfo;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\paymentInfo;
use App\Shipping;
//use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UserRegistration;
use Image;

class OrdersManage extends Controller
{
    public  function  manageOrders(){

        $orders = DB::table('orders')
            ->join('user_registrations','orders.UserId','=','user_registrations.id')
            ->join('payments','orders.id','=','payments.orderId')
            ->select('orders.*','user_registrations.Username','payments.payType','payments.payStatus')
            ->get();

        return view('back-end.manage-orders',['orders'=>$orders]);
    }

    public  function  orderView($id){
        $order = Order::find($id);
        $user = UserRegistration::find($order->userId);
        $shipping = Shipping::find($order->shippingId);
        $payment = Payment::where('orderId',$order->id)->first();
        $orderDetails = OrderDetail::where('orderId',$order->id)->get();

        return view('back-end.view-order',[
            'order' => $order,
            'user' => $user,
            'shipping' => $shipping,
            'payment' => $payment,
            'orderDetails' => $orderDetails,
        ]);
    }

    public  function orderInvoiceView($id){
        $order = Order::find($id);
        $shipping = Shipping::find($order->shippingId);
        $payment = Payment::where('orderId',$order->id)->first();
        $orderDetails = OrderDetail::where('orderId',$order->id)->get();


        $pdf = PDF::loadView('back-end.order-invoice',[
            'order' => $order,
            'shipping' => $shipping,
            'payment' => $payment,
            'orderDetails' => $orderDetails,
        ]);
//        return $pdf->download('back-end.order-invoice');
        return $pdf->stream('back-end.order-invoice');
    }



    public function  orderUpdate($id){
        $order = Order::find($id);
        $user = UserRegistration::find($order->userId);
        $payment = Payment::where('orderId',$order->id)->first();

        return view('back-end.editOrder',[
            'order' => $order,
            'user' => $user,
            'payment' => $payment ,
        ]);
    }

    public  function updateOrders(Request $request){
        $payment = Payment::find($request->paymentId);
        $payment->payStatus  = $request->payStatus;
        $payment->save();

        $order = Order::find($request->orderId);
        $order->orderStatus = $request->orderStatus;
        $order->save();

        return redirect('/Orders/Manage')->with('message','Order Info Updated Successfully.');
    }

    public  function  orderDelete($id){
        $order = Order::find($id);
        $shipping = Shipping::find($order->shippingId);
        $payment = Payment::where('orderId',$order->id)->first();
        $orderDetails = OrderDetail::where('orderId',$order->id)->get();
        $payment->delete();
        $shipping->delete();
        $order->delete();
        foreach ($orderDetails as $orderDetail){
            $orderDetail->delete();
        }

        return redirect('/Orders/Manage')->with('message','Full Order Information Deleted Successfully.');
    }























    public  function  addCompanyDetails(){
        return view('back-end.addCompanyInfo');
    }

    protected  function  basicInfoValidate($request){
        $this->validate($request,[
            'company_name' => 'required',
            'company_hotLine' => 'required',
            'manager_cell' => 'required',
            'company_logo' => 'required',
            'fb_page' => 'required',
            'twitter_page' => 'required',
            'gPlus_page' => 'required',
            'linkedIn_page' => 'required',
            'company_address' => 'required',
            'aboutUs_info' => 'required',
        ]);
    }

    protected  function  basicInfoStore($request,$logoUrl){
        $basicInfo = new basicInfo();

        $basicInfo->company_name  =  $request->company_name ;
        $basicInfo->company_hotLine  =  $request->company_hotLine ;
        $basicInfo->manager_cell  =  $request->manager_cell ;
        $basicInfo->company_logo  =  $logoUrl ;
        $basicInfo->fb_page  =  $request->fb_page ;
        $basicInfo->twitter_page  =  $request->twitter_page ;
        $basicInfo->gPlus_page  =  $request->gPlus_page ;
        $basicInfo->linkedIn_page  =  $request->linkedIn_page;
        $basicInfo->company_address  =  $request->company_address ;
        $basicInfo->aboutUs_info  =  $request->aboutUs_info ;
        $basicInfo->save();
    }


    public  function  saveBasicInfo(Request $request ){
        $this->basicInfoValidate($request);

        $companyLogo = $request->file('company_logo');
        $logoName = $companyLogo->getClientOriginalName();
        $directory = 'Product-Images/';

        $logoUrl = $directory.$logoName;
//        $productImageF->move($directory,$imageNameF);
        Image::make($companyLogo)->resize(400,400)->save($logoUrl);

        $this->basicInfoStore($request,$logoUrl);

        return redirect('/Company/AddDetails')->with('message','Your Company Details Stored Successfully .');
    }



    public  function  manageCompanyDetails(){
        $basicInfos  = DB::table('basic_infos')->get();

        return view('back-end.manageBasicInfo',['basicInfos'=>$basicInfos]);
    }

    public  function  basicInfoDelete($id){
        $basicInfo = basicInfo::find($id);
        $basicInfo->delete();
        return redirect('/Company/ManageDetails')->with('message','Your Company Basic Info Deleted Successfully.');
    }













    public function addPaymentInfo(){
        return view('back-end.addPaymentInfo');
    }


    protected  function  bankInfoValidate($request){
        $this->validate($request,[
            'bank_name' => 'required',
            'bankShort_name' => 'required',
            'bank_url' => 'required',
            'bank_logo' => 'required',
            'acHolder_name' => 'required',
            'account_no' => 'required',
            'account_type' => 'required',
        ]);
    }


    protected  function  bankInfoStore($request,$logoUrl){
        $payInfo = new paymentInfo();

        $payInfo->bank_name  =  $request->bank_name ;
        $payInfo->bankShort_name  =  $request->bankShort_name ;
        $payInfo->bank_url  =  $request->bank_url ;
        $payInfo->bank_logo  =  $logoUrl ;
        $payInfo->acHolder_name  =  $request->acHolder_name ;
        $payInfo->account_no  =  $request->account_no ;
        $payInfo->account_type  =  $request->account_type ;
        $payInfo->save();
    }


    public function  savePaymentInfo(Request $request){
        $this->bankInfoValidate($request);

        $bankLogo = $request->file('bank_logo');
        $logoName = $bankLogo->getClientOriginalName();
        $directory = 'Product-Images/';

        $logoUrl = $directory.$logoName;
//        $productImageF->move($directory,$imageNameF);
        Image::make($bankLogo)->resize(400,400)->save($logoUrl);

        $this->bankInfoStore($request,$logoUrl);

        return redirect('/Payment/AddDetails')->with('message','Your Payment Info Stored Successfully .');
    }


    public  function  managePaymentInfo(){
        $payInfos = DB::table('payment_infos')->get();
        return view('back-end.managePayInfo',['payInfos' =>$payInfos ]);
    }

    public  function  payInfoDelete($id){
        $payInfo = paymentInfo::find($id);
        $payInfo->delete();

        return redirect('/Payment/ManageDetails')->with('message','Your Payment Info Deleted Successfully.');
    }








}
