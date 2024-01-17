<?php

namespace App\Http\Controllers\SuperAdmin\Master;

use App\Http\Controllers\Controller;
use App\Models\Admin\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PositionController extends Controller
{

    protected $position;

    public function __construct(Position $position)
    {
        $this->position = $position;
    }
    public function index()
    {
        $position = $this->position->all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('superadmin.pages.master.admin_position.index', compact('position'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->position->create([
                'position_admin' => $request->name,
            ]);
            DB::commit();
            Alert::success('Success', 'Data berhasil ditambahkan');
            return back()->with('success', 'Data berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            alert::error('Error', $e->getMessage());
            return back()->with('error', 'Data gagal ditambahkan' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $position = $this->position->find($id);
            $position->update([
                'position_admin' => $request->name,
            ]);
            DB::commit();
            Alert::success('Success', 'Data berhasil diupdate');
            return back()->with('success', 'Data berhasil diupdate');
        } catch (\Exception $e) {
            DB::rollBack();
            alert::error('Error', $e->getMessage());
            return back()->with('error', 'Data gagal diupdate' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $position = $this->position->find($id);
            $position->delete();
            DB::commit();
            Alert::success('Success', 'Data berhasil dihapus');
            return back()->with('success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            alert::error('Error', $e->getMessage());
            return back()->with('error', 'Data gagal dihapus' . $e->getMessage());
        }
    }
}
