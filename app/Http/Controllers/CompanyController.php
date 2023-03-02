<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $companies = Company::orderBy('id' , 'desc')->paginate(5);
        // $this->authorize('viewAny' , Admin::class);
        return response()->view('cms.company.index' , compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $cities = City::all();
        // $roles = Role::where('guard_name' , 'admin')->get();
        // $this->authorize('create' , Admin::class);

        return response()->view('cms.company.create' , );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *  $users->actor()->associate($admins);

     */
    public function store(Request $request)
    {
        $validator = Validator($request->all() ,[
            'email' => 'required|email',
            'name' => 'required|name',
            'stuts' => 'required|stuts',
            'email' => 'required|email',
            'desc' => 'required|desc',


        ]);
        if(! $validator->fails()){
            $companies = new Company();
            $companies->email = $request->get('email');
            $companies->name = $request->get('name');
            $companies->stuts = $request->get('stuts');
            $companies->stuts = $request->get('desc');
            $isSaved = $companies->save();
            if($isSaved){


                return response()->json(['icon' => 'success' , 'title' => 'Created is Successfully'] , 200);

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title'=>$validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins = Company::findOrFail($id);
        // $roles = Role::where('guard_name' , 'admin')->get();
        // $cities = City::all();
        $this->authorize('update' , Company::class);

        return response()->view('cms.admin.edit' , compact('admins'
    ));
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
        $validator = Validator($request->all() , [
            'password' => 'nullable',
        ]);

        if(! $validator->fails()){
            $admins = Company::findOrFail($id);
            $admins->email = $request->get('email');
            $isSaved = $admins->save();

            if($isSaved){
                $users = $admins->user;
                // $roles = Role::findOrFail($request->get('role_id'));
                // $admins->assignRole($roles->name);

                if (request()->hasFile('image')) {

                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin', $imageName);

                    $users->image = $imageName;
                    }

                $isSaved = $users->save();

                return ['redirect'=>route('companies.index')];

            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title' => $validator->getMessageBag()->first()] ,400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Company::destroy($id);
        $this->authorize('delete' , Companyn::class);

    }

}

