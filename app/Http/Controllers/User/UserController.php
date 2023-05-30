<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function createWelcome()
    {
        $data = Barang::take(4)->orderBy('id', 'asc')->get();
        $data2 = Barang::take(4)->orderBy('id', 'desc')->take(3)->get();
        return view('welcome', ['data' => $data, 'data2' => $data2]);
    }

    public function createProductDetail($id)
    {
        $data = Barang::where('id', $id)->first();
        $like = Barang::where('id', '!=', $id)->get();
        return view('productDetail', ['data' => $data, 'like' => $like]);
    }

    public function storeProductDetail(Request $request)
    {
        $barang = Barang::where('id', $request->id)->first();

        $checkIsPending = Transaction::where('name', Auth::user()->id)->where('status', 'Pending')->first();

        // if there is a Pending Transaction
        if ($checkIsPending) {

            Transaction::where('id', $checkIsPending->id)->update([
                'name' => Auth::user()->id,
                'phone' => 'Pending',
                'address' => 'Pending',
                'paymentMethod' => 'Pending',
                'status' => 'Pending',
                'totalPrice' => $checkIsPending->totalPrice + $barang->price,
            ]);

            $checkPreviousTDetail = TransactionDetail::where('transactionID', $checkIsPending->id)->where('barangID', $request->id)->first();
            if ($checkPreviousTDetail) {
                TransactionDetail::where('id', $checkPreviousTDetail->id)->update([
                    'quantity' =>  $checkPreviousTDetail->quantity + 1,
                ]);
            } else {
                TransactionDetail::create([
                    'transactionID' => $checkIsPending->id,
                    'barangID' => $request->id,
                    'quantity' => 1,
                ]);
            }
            // If New Transaction
        } else {

            Transaction::create([
                'name' => Auth::user()->id,
                'phone' => 'Pending',
                'address' => 'Pending',
                'paymentMethod' => 'Pending',
                'status' => 'Pending',
                'totalPrice' => $barang->price,
            ]);

            TransactionDetail::create([
                'transactionID' => Transaction::count(),
                'barangID' => $request->id,
                'quantity' => 1,
            ]);
        }

        return redirect('user/cart');
    }

    public function createCart()
    {
        $transaction = DB::table('transactions')
            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transactionID')
            ->join('barangs', 'barangs.id', '=', 'transaction_details.barangID')
            ->where('transactions.name', '=', Auth::user()->id)
            ->where('transactions.status', '=', 'Pending')
            ->select('barangs.name as namaBarang', 'barangs.price as priceBarang', 'barangs.description as descriptionBarang', 'barangs.category as categoryBarang', 'barangs.stock as stockBarang', 'transaction_details.quantity as quantityBarang', 'transactions.totalPrice as totalPrice', 'barangs.image as imageBarang', 'transaction_details.id as transactionDetailsID')
            ->get();

        return view('cart', ['transaction' => $transaction]);
    }

    public function quantityCart(Request $request)
    {
        $check = TransactionDetail::where('id', $request->transactionDetailsID)->first();
        $hargaBarang = Barang::where('id', $check->barangID)->first();
        $transaction = Transaction::where('id', $check->transactionID)->first();

        if ($request->minus == "minus") {
            if ($check->quantity > 1) {
                TransactionDetail::where('id', $request->transactionDetailsID)->update([
                    'quantity' => $check->quantity - 1,
                ]);
            } else if ($check->quantity == 1) {
                TransactionDetail::where('id', $request->transactionDetailsID)->delete();
            }

            Transaction::where('id', $check->transactionID)->update([
                'totalPrice' => $transaction->totalPrice - $hargaBarang->price,
            ]);
        } else {
            TransactionDetail::where('id', $request->transactionDetailsID)->update([
                'quantity' => $check->quantity + 1,
            ]);

            Transaction::where('id', $check->transactionID)->update([
                'totalPrice' => $transaction->totalPrice + $hargaBarang->price,
            ]);
        }

        return redirect()->back();
    }

    public function storeCart(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'payment' => 'required',
        ]);

        User::where('id', $request->userID)->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        $transactionDetails = TransactionDetail::where('id', $request->transactionDetailsID)->first();

        Transaction::where('id', $transactionDetails->transactionID)->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'paymentMethod' => $request->payment,
            'status' => 'Paid',
        ]);

        return redirect('/');
    }

    public function search(Request $request)
    {
        $check = Barang::where('name', $request->search)->orWhere('category', $request->search)->first();

        if (!$check) {
            return redirect()->back();
        }

        $data = Barang::where('id', $check->id)->first();
        $like = Barang::where('id', '!=', $check->id)->get();
        return view('productDetail', ['data' => $data, 'like' => $like]);
    }
}
