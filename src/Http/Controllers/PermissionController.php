<?php

namespace Jahir\Permission\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Jahir\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Permission List';
        $data['routesName'] = $this->getPermissions();
        $data['permissions'] = Permission::orderBy('id','DESC')->get();
        return view('permission::permission',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach($request->permission as $permission){
            Permission::create([
                'permission' => $permission,
                'permission_route' => $permission

            ]);
        }

        return redirect()->back()->with('message','Successfully added');
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
    }

    // return all un-inserted permission
    public function getPermissions(){
        $routes =  Route::getRoutes()->getRoutesByName();
        $route_name = [];
        $ignored = [];

        $routesName = [];
        // store all existing route in an array
        foreach($routes as $key=>$route){
            array_push($route_name,$key); 
        }

        $permissions = DB::table('permissions')->select('permission_route')->get() ;
        
        //  put all route saved in db into an array 
        foreach ($permissions as $existing_permission) {
            array_push($ignored,$existing_permission->permission_route);
        }
        
        // now compare with all existing route with saved permission
        foreach($route_name as $route_permission) {
            if(!in_array($route_permission,$ignored)){
                array_push($routesName,$route_permission);
            }else{
                continue;
            }
        }
        return $routesName;
    }
}
