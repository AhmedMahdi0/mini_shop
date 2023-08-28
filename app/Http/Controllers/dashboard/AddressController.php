<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\City;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Modules\UserModule\app\Models\User;

class AddressController extends Controller
{
    static public function index(Request $request)
    {

    }

    static public function edit($type, $id)
    {
        $class = '';
        switch ($type) {
            case 'users':
                $class = User::class;
                break;
            case 'vendors':
                $class = Vendor::class;
                break;
            default:
                $error=['message'=>'address type invalid'];
                return redirect()->back()->with(['error'=>$error]);
        }
        $address = Address::where('addressable_id', $id)->where('addressable_type', $class)->first();
        $cities = City::all();
        return view('address.edit', compact(['address', 'cities', 'type', 'id']));
    }

    static public function update(Request $request, $type, $id)
    {
        $class = '';
        switch ($type) {
            case 'users':
                $class = User::class;
                break;
            case 'vendors':
                $class = Vendor::class;
                break;
            default:
                $error=['message'=>'address type invalid'];
                return redirect()->back(compact('error'));
        }
        Address::updateOrInsert(['addressable_type' => $class, 'addressable_id' => $id],
            ['city_id' => $request->city, 'district' => $request->district, 'street' => $request->street, 'phone' => $request->phone]);

        return redirect()->route($type);
    }
}
