<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use App\paymentInfo;
use App\Products;
use App\Shipping;
use App\UserRegistration;
use Barryvdh\DomPDF\Facade as PDF;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Session;

class UserController extends Controller
{

    protected  function  userInfoValidate($request){
        $this->validate($request,[
            'Username' => 'required',
            'Email' => 'required|unique:user_registrations,Email',
            'UserPhone' => 'required',
            'UserAddress' => 'required',
            'Password' => 'required',
        ]);
    }

    protected  function  userInfoStore($request){
        $user = new UserRegistration();
        $user->Username  =  $request->Username ;
        $user->Email  =  $request->Email;
        $user->UserPhone  =  $request->UserPhone ;
        $user->UserAddress  =  $request->UserAddress ;
        $user->Password  =  Hash::make($request->Password);
        $user->save();

        return $user;
    }



    public  function  userLogin(){
        return view('front-end.login-effect');
    }


    public  function newUserLoginCheck(Request $request){
        $this->validate($request,[
            'EmailLogin' => 'required|exists:user_registrations,Email',
            'PasswordLogin' => 'required',
        ]);

        $user = UserRegistration::where('Email',$request->EmailLogin)->first();

        if ( password_verify($request->PasswordLogin , $user->Password)){
            $userId = $user->id;
            $userName = $user->Username;
            Session::put('userId', $userId);
            Session::put('userName',$userName);

            return redirect('/');
        }
        else{
            return redirect('/users/login')->with('message','Your Password Is Wrong.');
        }
    }

    public  function  newReg(){
        return view('front-end.registration-effect');
    }

    public  function  newUserRegistration(Request $request){
        $this->userInfoValidate($request);

        $user = $this->userInfoStore($request);
        $userId = $user->id;
        $userName = $user->Username;
        Session::put('userId', $userId);
        Session::put('userName',$userName);

//        $data = $user->toArray();
//        Mail::send('front-end.confirmation-mail',$data,function ($message) use ($data){
//            $message->to($data['Email']);
//            $message->subject('Confirmation Mail.');
//        });

        return redirect('/');
    }






    public  function  newUserLogout(){

        Session::forget('userId');
        Session::forget('userName');
        Session::forget('totalBill');
        Session::forget('totalQuantity');
        Session::forget('shippingId');
        return redirect('/');
    }

    public  function  userAccount(){

        $user = UserRegistration::find(Session::get('userId'))->first();
        $orders = DB::table('orders')->where('UserId','=', Session::get('userId') )
            ->join('user_registrations','orders.UserId','=','user_registrations.id')
            ->join('payments','orders.id','=','payments.orderId')
            ->select('orders.*','user_registrations.Username','payments.payType','payments.payStatus')
            ->get();

        return view('front-end.userAccount',[
            'orders'=>$orders,
            'user' => $user,
        ]);
    }



    public  function  userCheckoutLogin(Request $request){
        $this->validate($request,[
            'EmailLogin' => 'required|exists:user_registrations,Email',
            'PasswordLogin' => 'required',
        ]);

        $user = UserRegistration::where('Email',$request->EmailLogin)->first();

        if ( password_verify($request->PasswordLogin , $user->Password)){
            $userId = $user->id;
            $userName = $user->Username;
            Session::put('userId', $userId);
            Session::put('userName',$userName);

            return redirect('/users/shipping');
        }
        else{
            return redirect('/cart/checkOut')->with('message','Your Password Is Wrong.');
        }

    }






    public function userSignUp(Request $request){

        $this->userInfoValidate($request);

        $user = $this->userInfoStore($request);
        $userId = $user->id;
        $userName = $user->Username;
        Session::put('userId', $userId);
        Session::put('userName',$userName);

        $data = $user->toArray();
        Mail::send('front-end.confirmation-mail',$data,function ($message) use ($data){
            $message->to($data['Email']);
            $message->subject('Confirmation Mail.');
        });

        return redirect('/users/shipping');
    }


    public  function  userShipping(){
        $user = UserRegistration::find(Session::get('userId'));

        return view('front-end.shipping',['user'=>$user]);
    }

    public  function  saveShipping(Request $request){

        $this->validate($request,[
            'Username' => 'required',
            'Email' => 'required',
            'UserPhone' => 'required',
            'address' => 'required',
        ]);

        $ship = new Shipping();
        $ship->Username  =  $request->Username ;
        $ship->Email  =  $request->Email;
        $ship->UserPhone  =  $request->UserPhone ;
        $ship->address  =  $request->address ;
        $ship->save();

        Session::put('shippingId',$ship->id);

        return redirect('/users/payment');
    }

    public function  userPayment(){
        return view('front-end.payment');
    }

    private  function storeOrderInfo($request){
        $order = new Order();
        $order->userId = Session::get('userId');
        $order->shippingId = Session::get('shippingId');
        $order->totalBill =Session::get('totalBill');
        $order->save();
        Session::put('orderId',$order->id);
        Session::put('orderTime',$order->created_at);


        $payment = new Payment();
        $payment->orderId = $order->id ;
        $payment->payType = $request->pay_type ;
        $payment->save();

        $cartProducts = Cart::getContent();

        foreach ($cartProducts as $cart){
            $orderDetails = new OrderDetail();
            $orderDetails->orderId = $order->id;
            $orderDetails->productId = $cart->id;
            $orderDetails->productName = $cart->name;
            $orderDetails->productImage = $cart->attributes->imageF;
            $orderDetails->productPrice = $cart->price;
            $orderDetails->productQuantity = $cart->quantity;
            $orderDetails->save();
        }

        Cart::clear();
        Session::forget('totalBill');
        Session::forget('totalQuantity');
    }


    public function saveOrder(Request $request){
        $payType = $request->pay_type;
        if($payType == 'bank'){
            $this->storeOrderInfo($request);
            return redirect('/user/BankType')->with('message','Your Order Has been stored In HM Database , We will contact you soon . Thanks For being with Us .');
        }
        elseif($payType == 'bkash'){
            $this->storeOrderInfo($request);
            return redirect('/user/BankType')->with('message','Your Order Has been stored In HM Database , We will contact you soon . Thanks For being with Us .');
        }
        elseif ($payType == 'rocket'){
            $this->storeOrderInfo($request);
            return redirect('/user/BankType')->with('message','Your Order Has been stored In HM Database , We will contact you soon . Thanks For being with Us .');
        }
        elseif ($payType == 'mcash'){
            $this->storeOrderInfo($request);
            return redirect('/user/BankType')->with('message','Your Order Has been stored In HM Database , We will contact you soon . Thanks For being with Us .');
        }
        else{
            return redirect('/users/payment');
        }
    }


    public  function  userBankType(){
        return view('front-end.user-bank');
    }

    public function  saveUserBank(Request $request){
        $bankName= $request->bank_name ;
        if ($bankName == 'ebl'){
            return view('front-end.bank-details')->with('message','Here Is Your Selected Banks Full Billing Info. Just Download this & Pay to your nearest Branch .');
        }
        elseif ($bankName == 'dbbl'){
            return redirect('/user/BankPayDetails')->with('message','Here Is Your Selected Banks Full Billing Info. Just Download this & Pay to your nearest Branch .');
        }
        elseif($bankName == 'bbl'){
            return redirect('/user/BankPayDetails')->with('message','Here Is Your Selected Banks Full Billing Info. Just Download this & Pay to your nearest Branch .');
        }
        elseif ($bankName == 'mtbl'){
            return redirect('/user/BankPayDetails')->with('message','Here Is Your Selected Banks Full Billing Info. Just Download this & Pay to your nearest Branch .');
        }

    }

    public  function  userBankPayDetails($id){
        $order = Order::find($id);
        $shipping = Shipping::find($order->shippingId);
        $payment = Payment::where('orderId',$order->id)->first();
        $account =  paymentInfo::where('bankShort_name',$payment->payType)->first();
        $orderDetails = OrderDetail::where('orderId',$order->id)->get();


        $pdf = PDF::loadView('front-end.bank-details',[
            'order' => $order,
            'shipping' => $shipping,
            'payment' => $payment,
            'account' => $account,
            'orderDetails' => $orderDetails,
        ]);
//        return $pdf->download('back-end.order-invoice');
        return $pdf->stream('front-end.bank-details');
//        return view('front-end.bank-details');
    }




    public  function  userContact(){
        return view('front-end.contact');
    }

//    public function userCheckout(){
//        return view('front-end.checkout');
//    }

    public function  categoryProducts($id){
//        $catProducts = Products::where('category_id',$id)
//            ->get();

        $catProducts = DB::table('products')->where('category_id',$id)
            ->join('categories','products.category_id' ,'=' ,'categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.cat_name','brands.brand_name')
            ->get();
        $topRates = Products::where('publication',1)
            ->orderBy('id','DESC')
            ->take(4)
            ->get();

        return view('front-end.products',[
            'catProducts'=>$catProducts,
            'topRates' => $topRates,
            ]);
    }

    public function  brandProducts($id){
//        $catProducts = Products::where('category_id',$id)
//            ->get();

        $catProducts = DB::table('products')->where('brand_id',$id)
            ->join('categories','products.category_id' ,'=' ,'categories.id')
            ->join('brands','products.brand_id','=','brands.id')
            ->select('products.*','categories.cat_name','brands.brand_name')
            ->get();
        $topRates = Products::where('publication',1)
            ->orderBy('id','DESC')
            ->take(4)
            ->get();

        return view('front-end.products',[
            'catProducts'=>$catProducts,
            'topRates' => $topRates,
        ]);
    }

    public  function  userProductView($id){
        $viewProduct = Products::where('id',$id)->first();

        $newProducts = Products::where('publication',1)
            ->orderBy('id','DESC')
            ->take(4)
            ->get();

        return view('front-end.product-view' , [
            'viewProduct'=>$viewProduct,
            'newProducts' => $newProducts,
            ]);
    }


    public  function  saveUserReview(Request $request){
        return $request;
    }



}
