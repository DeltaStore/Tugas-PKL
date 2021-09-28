<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {

        $item = Transaction::with(['details','product',])->findorFail($id);
        return view('pages.checkout',[
            'item' => $item
        ]);

        $item = Product::with(['product_galleries'])
        ->where('slug',$slug)
        ->firstOrfail();
        return view('pages.checkout',[
            'item' => $item
        ]);

    }




    public function process(Request $request, $id)
    {

        $product = Product::findorFail($id);
        

        $transaction = Transaction::create([
           
            'uid' => 'ID',
            'transaction_total' => $product->price,
            'transaction_status' => 'PENDING'

        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'products_id' =>$product->id

        ]);

        return redirect()->route('checkout',$transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findorFail($detail_id);

        $transaction = Transaction::with(['details','product'])
            ->findorfail($item->transactions_id);

        $transaction->transaction_total -= 
            $transaction->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout',$item->transactions_id);
        
    }

    public function create(Request $request, $id)
    {
        $transaction = DB::table('transactions')->update([

            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            'adress'=>$request->input('adress')

            

        ]);

        $request->validate([

            'name' => 'required|string',
            'email' => 'required|email', 
            'phone' => 'required|numeric',
            'adress' => 'required|string',

        ]);

        
 

        $data = $request->all();
        $data['transactions_id'] = $id;

        TransactionDetail::create($data);
        $transaction = Transaction::with(['products'])->find($id);

        $transaction->transaction_total += $transaction->product->price;

        $transaction->save();

        return redirect()->route('checkout',$id);
    }




    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details','product.product_galleries','user'])->findorFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();


        // Kirim Email Ke User
    //    Mail::to($transaction->user)->send(
    //        new TransactionSuccess($transaction)
    //    );



        
        return view('pages.success');
    }
}
