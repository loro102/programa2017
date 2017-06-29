<?php

namespace App\Http\Controllers;


use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
Use App\User;


Class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role=Role::paginate(10);
        return view('admin.roles.index',['roles'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role=new Role;
        return view('admin.roles.create',['role'=>$role]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Role::create($request->input());
        return redirect('role')->with('message','Se ha añadido un nuevo rol');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role=Role::findorFail($id);
        $permiso=Permission::all()->pluck('slug','id')->prepend('Seleccione permiso','');
        $permissions=$role->getPermissions();
        return view('admin.roles.show',[
            'role'=>$role,
            'select'=>$permiso,
            'permisos'=>$permissions
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $role=Role::findorFail($id);
        return view('admin.roles.edit',[
            'role'=>$role
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $role=Role::findorFail($id);
        $role->fill($request->all())->save();
        return redirect()->action('rolesController@index')->with('message','El rol se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Role::destroy($id);
        return redirect('role')->with('message','El rol se ha eliminado correctamente');
    }
    public function assign(Request $request)
    {
        //
        $role = User::find($request->user);
        $role->assignRole($request->role);
        $role->save();;
        return redirect()->action('userController@show',['id'=>$role->id])->with('message','Se ha asignado un permiso correctamente');
    }
    public function revoke(Request $request)
    {
        //
        $role = User::find($request->user);
        $role->revokeRole($request->role);
        $role->save();;
        return redirect()->action('userController@show',['id'=>$role->id])->with('message','Se ha asignado un permiso correctamente');
    }
}
