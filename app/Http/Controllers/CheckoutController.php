<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\TransactionSuccess;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\TravelPackages;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class CheckoutController extends Controller
{
    public function index(Request $request, $id)
    {
        $item = Transaction::with(['details', 'travel_packages', 'user'])->findOrFail($id);
        // dd($id);
        return view('pages.checkout', [
            'item' => $item,
        ]);
        
    }

    public function process(Request $request, $id)
    {
        $travel_package = TravelPackages::findOrFail($id);
        $transaction = Transaction::create([
            'travel_packages_id' => $id,
            'user_id' => Auth::user()->id,
            'additional_visa' => 0,
            'transaction_total' => $travel_package->price,
            'transaction_status' => 'IN_CART',
        ]);
        
        //challange : tidak dihardcode
        TransactionDetail::create([
            'transaction_id' => $transaction->id,
            'username' => Auth::user()->username, //hint : simpan di table
            'nationality' => 'ID',
            'is_visa' => false,
            'doe_passport' => Carbon::now()->addYears(5),
        ]);
        
        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id)
    {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with(['details', 'travel_packages'])
           ->findOrFail($item->transaction_id);
        
        if($item->is_visa)
        {
            $transaction->transaction_total -= 190;
            $transaction->additional_visa -= 190;
        }

        $transaction->transaction_total -= $transaction->travel_packages->price;

        $transaction->save();
        $item->delete();

        return redirect()->route('checkout', $item->transaction_id);
    }

    public function create(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'is_visa' => 'required|boolean',
            'doe_passport' => 'required',
        ]);

        $data = $request->all();
        $data['transaction_id'] = $id;
        
        TransactionDetail::create($data);

        $transaction = Transaction::with(['travel_packages'])->find($id);
        
        if($request->is_visa)
        {
            $transaction->transaction_total += 190;
            $transaction->additional_visa += 190;
        }

        $transaction->transaction_total += $transaction->travel_packages->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id)
    {
        $transaction = Transaction::with(['details','travel_packages.galleries','user'])
            ->findOrFail($id);
        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        //send email to user
        Mail::to($transaction->user)->send(
            new TransactionSuccess($transaction)
        );

        return view('pages.success');
    }
}
