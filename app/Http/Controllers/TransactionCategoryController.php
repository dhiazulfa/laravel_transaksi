<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\TransactionCategory;


class TransactionCategoryController extends Controller
{
                /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
   {
       $this->middleware('auth');
   }

    public function index()
    {
        $transaction_categories = TransactionCategory::with('transaction')->orderBy('created_at', 'DESC')->paginate(10);
        return view('transaction_categories.index', compact('transaction_categories'));
    }

    public function create()
    {
        $transactions = Transaction::orderBy('description', 'ASC')->get();
        return view('transaction_categories.create', compact('transactions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|string|',
            'transaction_name' => 'required|string|max:50',
            'nominal' => 'required|integer',
            'transaction_id' => 'required|exists:transactions,id'
        ]);

        try{
            $transaction_categories = TransactionCategory::create([
                'category' => $request->category,
                'transaction_name' => $request->transaction_name,
                'nominal' => $request->nominal,
                'transaction_id' => $request->transaction_id
            ]);
            return redirect(route('kategori_transaksi.index'))->with(['success' => '<strong>' . $product->transaction_name . '</strong> Ditambahkan']);

        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        //query select berdasarkan id
        $transaction_categories = TransactionCategory::findOrFail($id);
        //mengecek, jika field photo tidak null / kosong
        $transaction_categories->delete();
        return redirect()->back()->with(['success' => '<strong>' . $products->transaction_name . '</strong> Telah Dihapus!']);
    }

    public function edit($id)
    {
        //query select berdasarkan id
        $transaction_categories = TransactionCategory::findOrFail($id);
        $transaction = Transaction::orderBy('description', 'ASC')->get();
        return view('transaction_categories.edit', compact('transaction_categories', 'transactions'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $this->validate($request, [
            'category' => 'required|string|',
            'transaction_name' => 'required|string|max:50',
            'nominal' => 'required|integer',
            'transaction_id' => 'required|exists:transactions,id'
        ]);

        try{
            //query select berdasarkan id
            $transaction_categories = TransactionCategory::findOrFail($id);
            //perbaharui data di database
            $transaction_categories->update([
                'category' => $request->category,
                'transaction_name' => $request->transaction_name,
                'nominal' => $request->nominal,
                'transaction_id' => $request->transaction_id
            ]);
                return redirect(route('kategori_transaksi.index'))
                ->with(['success' => '<strong>' . $transaction_categories->transaction_name . '</strong> Diperbaharui']);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }
}
