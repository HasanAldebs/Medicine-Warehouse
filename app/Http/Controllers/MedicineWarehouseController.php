<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicineWarehouseController extends Controller
{

    public function createMidicine(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'scientific name' => 'required',
                'commercial name' => 'required',
                'category' => 'required',
                'manufacture company' => 'required',
                'quantity Available' => 'required',
                'expiration date' => 'required|date',
                'price' => 'required|numeric'

            ],
            [
                'scientific name.required' => ' You must enter the Scientific Name  ',
                'commercial name.required' => ' You must enter the Commercial Name ',
                'category.required' => ' You must enter the Category ',
                'manufacture company.required' => ' You must enter the Manufacture Company ',
                'quantity available.required' => ' You must enter the Quantity Available  ',
                'expiration date.required' => ' You must enter the Expiration Date   ',
                'price.numeric' => ' Sorry, the price must be numbers  ',
                'price.required' => ' You must enter the Price '
            ]
//            [
//                'scientific name.required' => ' يجب إدخال الاسم العلمي  ',
//                'commercial name.required' => ' يجب إدخال الاسم التجاري  ',
//                'category.required' => ' يجب إدخال التصنيف  ',
//                'manufacture company.required' => ' يجب إدخال الشركة المصنعة  ',
//                'quantity Available.required' => ' يجب إدخال الكمية المتوفرة  ',
//                'expiration date.required' => ' يجب إدخال تاريخ إنتهاء الصلاحية   ',
//                'price.numeric' => 'المعذرة السعر يجب ان يكون ارقام ',
//                'price.required' => ' يجب إدخال السعر '
//            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validate failed',
                'errors' => $validator->errors()->all()
            ], 400);

        }
        $medicine  = Medicine::create([
                'scientific name' => $request->scientific_name,
                'commercial name' => $request->commercial_name,
                'category' => $request->category,
                'manufacture company' => $request->manufacture_company,
                'quantity available' => $request->quantity_available,
                'expiration date' => $request->expiration_date,
                'price' => $request->price


        ]);
        if ($medicine) {
            return response()->json([
                'message' => ' Product create successfully ',
                'data' => $medicine
            ], 200);
        } else {
            return response()->json([
                'message' => 'failed to create '
            ]);
        }
    }





}
