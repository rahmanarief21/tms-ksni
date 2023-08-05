<?php

namespace App\Http\Controllers\Car;

use App\Http\Controllers\Controller;
use App\Models\Car\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Constants\General;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin,staff');
    }

    public function index()
    {
        return view('pages.car.index');
    }

    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'car_name' => ['required', 'string', 'min:3'],
            'car_model' => ['required', 'string', 'min:2'],
            'car_license_plate' => ['required', 'string', 'min:4']
        ]);

        if ($validate->fails())
        {
            return response()->json([
                'message' => General::INSERT_FAILED,
                'data' => $request->all(),
                'err' => $validate->errors()
            ], 400);
        }

        $car = new Car;

        $car->name = $request->car_name;
        $car->model = $request->car_model;
        $car->license_plate = $request->car_license_plate;
        $car->current_status = TRUE;

        if (!$car->save())
        {
            return response()->json([
                'message' => General::INSERT_FAILED,
                'data' => $car,
                'err' => null
            ], 500);
        }

        return response()->json([
            'message' => General::INSERT_SUCCESS,
            'data' => $car,
        ]);
    }

    public function show()
    {
        $car = Car::with([
            'trips',
            'trips.user'
        ])->get();

        if (is_null($car) || $car->count() < 1)
        {
            return response()->json([
                'message' => General::DATA_NOT_FOUND,
            ], 404);
        }

        return response()->json([
            'message' => General::DATA_FOUND,
            'data' => $car
        ]);
    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        
        foreach($request->all() as $column => $value)
        {
            if ($value != "")
            {
                switch($column)
                {
                    case 'car_name' :
                        $car->name = $value;
                        break;
                    case 'car_model' :
                        $car->model = $value;
                        break;
                    case 'car_license_plate' :
                        $car->license_plate = $value;
                        break;
                }
                
            }
        }

        if(!$car->update())
        {
            return response()->json([
                'message' => General::UPDATE_FAILED,
                'data' => $request->all(),
                'id' => $id,
            ], 500);
        }

        return response()->json([
            'message' => General::UPDATE_SUCCESS,
            'data' => $car
        ]);
    }

    public function updateStatus($id, $status)
    {
        $car = Car::find($id);
        

        if (is_null($car) || $car->count() < 1)
        {
            return response()->json([
                'message' => General::DATA_NOT_FOUND,
                'id' => $id
            ], 404);
        }

        $car->current_status = (int) $status;

        if (!$car->update())
        {
            return response()->json([
                'message' => General::UPDATE_FAILED,
                'data' => $car,
            ], 500);
        }

        return response()->json([
            'message' => General::UPDATE_SUCCESS,
            'data' => $car
        ]);
    }

    public function destroy($id)
    {
        $car = Car::find($id);

        //Id Not Found
        if ($car == null || $car->count() < 1)
        {
            return response()->json([
                'message' => General::DATA_NOT_FOUND,
                'data' => $id
            ], 404);
        }

        //Delete Failed
        if (!$car->delete())
        {
            return response()->json([
                'message' => General::DELETE_FAILED,
                'data' => $car
            ], 500);
        }

        return response()->json([
            'message' => General::DELETE_SUCCESS,
            'data' => $car
        ]);

    }
}
