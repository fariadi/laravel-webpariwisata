<?php

namespace App\Http\Controllers\order;

use App\Http\Controllers\Controller;
use App\Models\OrderModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;

class OrderController extends Controller
{
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'order_name' => 'required|max:100',
        'order_quantity' => 'required',
        'order_date' => 'required'
    ]);

    if ($validator->fails()) {
        $errors = (new ValidationException($validator))->errors();
        $errorsMsg = '';

        foreach ($errors as $field => $error):
            $errorsMsg .= implode(' ', $error) . ". \n";
        endforeach;
        
        return response()->json([
            'error_code' => 400,
            'error_messages' => $errorsMsg
        ]);
    }

    $request->merge([
        'order_date' => Carbon::createFromFormat('d/m/Y', $request->input('order_date'))->format('Y-m-d')
    ]);

    OrderModel::create($request->all());

    return response()->json([
        'error_code' => 200,
        'error_messages' => ''
    ]);
  }
}
