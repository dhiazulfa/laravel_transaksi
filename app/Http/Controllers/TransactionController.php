<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionController extends Controller
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
        $transactions = Transaction::orderBy('created_at', 'DESC')->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|string|max:50',
            'code'        => 'required|integer',
            'rate_euro'   => 'required|integer',
            'date_paid'   => 'required|date'
        ]);

        try{
            $transactions = Transaction::firstOrCreate([
                'description' => $request->description,
                'code' => $request->code,
                'rate_euro' => $request->rate_euro,
                'date_paid' => $request->date_paid
            ]);

            return redirect()->back()->with(['success' => 'Transaksi: ' . $transactions->description . ' Ditambahkan']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->delete();
        return redirect()->back()->with(['success' => 'Transaksi: ' . $transactions->description . ' Telah Dihapus']);
    }

    public function edit($id)
    {
        $transactions = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transactions'));
    }

    public function update(Request $request, $id)
    {
    //validasi form
        $this->validate($request, [
            'description' => 'required|string|max:50',
            'code'        => 'required|integer',
            'rate_euro'   => 'required|integer',
            'date_paid'   => 'required|date'
    ]);

    try {
        //select data berdasarkan id
        $transactions = Transaction::findOrFail($id);
        //update data
        $transactions->update([
            'description' => $request->description,
            'code'        => $request->code,
            'rate_euro'   => $request->rate_euro,
            'date_paid'   => $request->date_paid
        ]);

        //redirect ke route kategori.index
        return redirect(route('transaksi.index'))->with(['success' => 'Transaksi: ' . $transactions->description . ' Diubah']);
    } catch (\Exception $e) {
        //jika gagal, redirect ke form yang sama lalu membuat flash message error
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}

}
