<?php

namespace App\Http\Controllers;

use Caffeinated\Shinobi\Models\Role;
use Illuminate\Http\Request;
use Caffeinated\Shinobi\Models\Permission;

Class PermisosController extends Controller
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
        $permisos=Permission::paginate(10);
        return view('admin.permisos.index',['permisos'=>$permisos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permiso=new Permission;
        return view('admin.permisos.create',['permiso'=>$permiso]);
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
        Permission::create($request->input());
        return redirect('permisos')->with('message','Se ha añadido un nuevo permiso');
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
        $permiso=Permission::findorFail($id);
        return view('admin.permisos.show',[
            'permiso'=>$permiso
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
        $permiso=Permission::findorFail($id);
        return view('admin.permisos.edit',[
            'permiso'=>$permiso,
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
        $permiso=Permission::findorFail($id);
        $permiso->fill($request->all())->save();
        return redirect()->action('permisosController@index')->with('message','El permiso se ha modificado correctamente');
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
        Permission::destroy($id);
        return redirect('permisos')->with('message','El permiso se ha eliminado correctamente');
    }

    public function assign(Request $request)
    {
        //
        $role = Role::find($request->role);
        $role->assignPermission($request->permiso);
        $role->save();;
        return redirect()->action('rolesController@show',['id'=>$role->id])->with('message','Se ha asignado un permiso correctamente');
    }
    public function revoke(Request $request)
    {
        //
        $role = Role::find($request->role);
        $role->revokePermission($request->permiso);
        $role->save();;
        return redirect()->action('rolesController@show',['id'=>$role->id])->with('message','Se ha asignado un permiso correctamente');
    }
}
