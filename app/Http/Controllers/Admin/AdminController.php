<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class AdminController extends Controller
{

    // Transaction Functions
    public function createDashboard()
    {
        $data = Transaction::get();
        return view('admin.dashboard', ['data' => $data]);
    }

    // Barang Functions
    public function createBarang()
    {
        $data = Barang::get();
        return view('admin.barang', ['data' => $data]);
    }

    public function storeBarang(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:20',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $imageName = $request->category . '/' . $request->picture->getClientOriginalName();
        $request->picture->move(public_path('barangImage/' . $request->category), $request->picture->getClientOriginalName());

        Barang::create([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect('admin/barang');
    }

    public function createDetailBarang($id)
    {
        $data = Barang::where('id', $id)->first();
        // $data = DB::table('barangs')->where('id', $id)->first();
        return view('admin.productDetail', ['data' => $data]);
    }

    public function storeDeleteBarang($id)
    {
        $delete = Barang::where('id', $id)->first();
        File::delete(public_path('barangImage/' . $delete->image));
        Barang::where('id', $id)->delete();

        return redirect('admin/barang');
    }

    public function acceptTransaction($id)
    {
        Transaction::where('id', $id)->update([
            'status' => 'Accepted',
        ]);

        return redirect()->back();
    }

    public function deleteTransaction($id)
    {
        Transaction::where('id', $id)->delete();

        return redirect()->back();
    }
}
