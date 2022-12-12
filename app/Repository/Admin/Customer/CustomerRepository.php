<?php

namespace App\Repository\Admin\Customer;

use App\Models\Customer;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerRepository implements ICustomerRepository
{
    public function saveCustomer(Request $request, array $data)
    {
      $image = $request->image;
  
      $originalName = $image->getClientOriginalName();

      $image_new_name = 'image-' .time() .  '-' .$originalName;

      $image->move('customers/image', $image_new_name);

      $customer = new Customer();
      $customer->name = $request->input('name');
      $customer->room_type_id = $request->input('room_type_id');
      $customer->total_number = $request->input('total_number');
      $customer->gender = $request->input('gender');
      $customer->id_card = $request->input('id_card');
      $customer->date = $request->input('date');
      $customer->time = $request->input('time');
      $customer->checkin = Carbon::now();
      $customer->checkout = Carbon::now();
      $customer->email = $request->input('email');
      $customer->phone_number = $request->input('phone_number');
      $customer->image = 'bookings/image/' . $image_new_name;
      $customer->address = $request->input('address');
      $customer->message = $request->input('message');
      $customer->status = $request->input('status');
      $customer->save();
    }

    public function updateCustomer(Request $request, Customer $customer, array $data)
    {
      $customer->checkout = Carbon::now();
      $customer->update();
    }

    public function removeCustomer(Customer $customer)
    {
        $customer = $customer->delete();
    }
}