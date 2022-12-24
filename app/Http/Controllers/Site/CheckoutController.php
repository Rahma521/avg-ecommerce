<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\OrderRequest;
use App\Models\RequestDetail;

use Illuminate\Http\Request;
use Cart;
class CheckoutController extends Controller
{
     public function CheckoutStore(OrderRequest $request){

        $shopId = 21036;
try{
    if (Cart::isEmpty()) {
        return back()->with(['error' =>'Cart not available']);
    } else {
if(auth()->user()) {
    $client = auth()->user();
}else{
        $client = $this->createUser($id, $request);


    }

    $saveProcess = DB::transaction(function () use ($shopId , $request ,$client) {
         $items = Cart::getContent();
        $total  = $this->getTotal( $items);
        $allVats = $this->getAllVats( $items);
        $net = $total + $allVats;
        $CouponDiscounts =  $this->getDiscounts($items);
        $fee = $this->getFee($net);
        

    });


}
}
catch(Exception $ex)
{
    return $ex;
}


$data=DB::table('requests')->insertGetId([

    'client_name'=>$request->name,
    'email'=>$request->email,
    'mobile'=>$request->mobile,
    'notes'=>$request->notes,
   'address'=>$request->address,
   'payment_type'=>$request->payment_method,
   'total'=>$request->total,

]);

$cartItems = Cart::getContent();
//dd($cartItems);
foreach($cartItems as $item){
  RequestDetail::insert([
       'request_id'=>$data,
        'item_id'=>$item->id,
        'order_name'=>$item->name,
        'quantity'=>1,
       'price'=>$item->price,

    ]);
}

//Cart::destroy();
 toastr()->success('Payment completed successfully');
 return redirect()->route('home');

//clear cart after request
 Cart::destroy();
 return redirect()->back()->with('success', 'Your rental request has been sent');


    }// end mehtod.

}
