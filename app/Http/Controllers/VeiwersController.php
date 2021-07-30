<?php

namespace App\Http\Controllers;

use App\Models\Veiwers;
use Facade\FlareClient\Http\Response;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class VeiwersController extends Controller
{
    public function index()
    {
        $viewer = Veiwers::all();
        return response()->json([
            'products' => $viewer
        ], 200);
    }
    public function show($id)
    {
        $viewer = Veiwers::find($id);
        if ($viewer) {
            return response()->json([
                'products' => $viewer
            ], 200);

        } else {
            return response()->json(['Message' => 'No viewer Found'], 404);
        }
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email|unique:veiwers',
            'fare' => 'required',
            'place' => 'required',

        ]);

        $viewer = new Veiwers();
        $viewer->name = $request->name;
        $viewer->email = $request->email;
        $viewer->fare = $request->fare;
        $viewer->place = $request->place;

    }

    // Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3|max:10',
            'email' => 'required|email|unique:veiwers',
            'fare' => 'required',
            'place' => 'required',

        ]);

        $viewer = Veiwers::find($id);
        if ($viewer) {
            $viewer->name = $request->name;
            $viewer->email = $request->email;
            $viewer->fare = $request->fare;
            $viewer->place = $request->place;
            $viewer->update();
            return response()->json(['message' => 'Viewers Updated'], 200);
        } else {
            return response()->json(['Message' => 'No viewer Found'], 404);
        }
    }

    // Delete Function
    public function delete($id){
      $viewer=Veiwers::find($id);
      if($viewer){
          $viewer->delete();
          return response()->json(['message' => 'Viewer Deleted'], 200);
      }
      else{
        return response()->json(['Message' => 'Error Finding data '], 404);
      }

    }
}
