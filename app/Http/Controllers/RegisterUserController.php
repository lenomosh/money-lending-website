<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ProperName;
use App\Rules\AgeOfAdult;
use App\Rules\ValideID;
use App\Rules\KenyanPhoneCode;
use App\Rules\SafaricomLine;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),
            [
                'fname'=>['required', new ProperName],
                'lname'=>['required', new ProperName],
                'dob'=>['required', new AgeOfAdult],
                'idno'=>['required',
                    'regex:/^\d+$/',
                    'min:7',
                    'max:8',
                    new ValideID],
                'gender'=>'required',
                'tel'=>['required',
                    new KenyanPhoneCode,
                    new SafaricomLine],
                'ltype'=>'required'

            ],
            $messages = array(
                'fname.required'    => 'First Name is required',
                'tel.required'    => 'Phone Number is required',
                'lname.required' => 'Last name is required.',
                'gender.required'      => 'Gender is required',
                'ltype.required'      => 'Loan type field is required',
                'idno.required'      => 'Your ID Number is required',
                'idno.min'      => 'The ID Number must be at least 7 characters',
                'idno.regex'      => 'Please enter a valid ID Number',
                'idno.max'      => 'Your ID Number may not be greater than 8 characters.',
                'dob.required'      => 'Please fill in your date of birth'
            )
        );
        if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
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
}
