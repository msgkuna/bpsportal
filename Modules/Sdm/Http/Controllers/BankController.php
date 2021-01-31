<?php

namespace Modules\Sdm\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Sdm\Entities\Bank as BankModel;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $bank = BankModel::paginate(20);
        return view('sdm::master.bank.index',compact('bank'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sdm::master.bank.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'bank_id' => 'required|numeric|digits:3',
            'uraian' => 'required',
        ]);

        try {
            BankModel::create($request->all());
            return redirect()->route('bank.index')
                            ->with('success','Data '. $request->uraian .' telah ditambahkan.');
        } catch (\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->route('bank.index')
                    ->withError('Data duplikat.');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(BankModel $bank)
    {
        return view('sdm::master.bank.edit',compact('bank'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, BankModel $bank)
    {
        $request->validate([
            'bank_id' => 'required',
            'uraian' => 'required',
        ]);

        $bank->update($request->all());

        return redirect()->route('bank.index')
                        ->with('success','Data '. $request->uraian .' telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(BankModel $bank)
    {
        $bank->delete();

        return redirect()->route('bank.index')
                        ->with('success','Data '. $bank->uraian .' telah di hapus');
    }
}
