<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Models\RandomModel;
use App\Models\BreakdownModel;

class RandomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faker = Faker::create();

        $name = array();

        RandomModel::where('flag','Y')->update(['flag' =>"N"]);

        for($x = 5; $x <= 10; $x++)
        {

            $random = New RandomModel();

            $random->values = $faker->name;
            $random->flag = 'Y';
            $random->save();

            for($y = 5; $y <=10; $y++)
            {
                $breakdown = New BreakdownModel();

                $breakdown->values = $faker->regexify('[A-Za-z0-9]{5}');
                $breakdown->random_id = $random->id;;
                $breakdown->save();
            }

        }

        $random = RandomModel::with('random')->where('flag', 'Y')->get();
        // $random = RandomModel::all();

    return view('random.index',compact('random'));
        
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
        //
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
       
    }
}
