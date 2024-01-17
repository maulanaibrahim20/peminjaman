<?php

namespace App\Http\Controllers\SuperAdmin\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Role;
use App\Models\Student\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $user;
    protected $admin;
    public function __construct(User $user, Admin $admin)
    {
        $this->user = $user;
        $this->admin = $admin;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = $this->admin->all();

        return view('superadmin.pages.user.admin.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.pages.user.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create($request->all() + [
                'role_id' => Role::ADMIN,
                'username' => $request->name,
                'password' => Hash::make($request->password),
            ]);

            $user->setFillableAttributes();
            if ($user->role_id === Role::ADMIN) {
                $user->email_verified_at = Carbon::now();
                $user->remember_token = Str::random(10);
            }
            $user->save();

            $this->admin->create([
                'user_id' => $user->id,
            ]);
            DB::commit();
            Alert::success('sucess', 'data berhasil di tambhakan');
            return redirect('/superadmin/create/admin')->with('success', 'Data berhasil ditambahkan');
        } catch (\Throwable $e) {
            Alert::error('gagal update' . $e->getMessage());
            return back()->with('error', 'Gagal menambahkan data');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
