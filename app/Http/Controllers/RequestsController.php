<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateRequestsRequest;
use App\Http\Requests\CreateSubscribersRequest;
use App\Notifications\NewMessage;
use App\User;
use App\Requests;
use App\Product;
use App\Subscribers;
use Newsletter;

class RequestsController extends Controller
{

  public function requestStore(CreateRequestsRequest $request)
  {
    $message = $request->all();
    Requests::create($message);
    Newsletter::subscribe($request->requests_email);
    $telegram_message =
    "Name: " . $request->requests_first_name . " " . $request->requests_last_name . " \n" .
    "Phone: " . $request->requests_phone . " \n" .
    "Email: " . $request->requests_email . " \n" .
    "Country: " . $request->requests_country . " \n" .
    "Address Line 1: " . $request->requests_address_line_1 . " \n" .
    "Address Line 2: " . $request->requests_address_line_2 . " \n" .
    "City: " . $request->requests_city . " \n" .
    "Province/State: " . $request->requests_province . " \n" .
    "Postal/ZIP: " . $request->requests_postal . " \n" .
    "Product: " . " \n" .
    "Comment: " . $request->requests_comment . " \n";
    $mail_message =
    "Name: " . $request->requests_first_name . " " . $request->requests_last_name . "<br />" .
    "Phone: " . $request->requests_phone . "<br />" .
    "Email: " . $request->requests_email . "<br />" .
    "Country: " . $request->requests_country . "<br />" .
    "Address Line 1: " . $request->requests_address_line_1 . "<br />" .
    "Address Line 2: " . $request->requests_address_line_2 . "<br />" .
    "City: " . $request->requests_city . "<br />" .
    "Province/State: " . $request->requests_province . "<br />" .
    "Postal/ZIP: " . $request->requests_postal . "<br />" .
    "Product: " . "<br />" .
    "Comment: " . $request->requests_comment . "<br />";
    $this->alarmerbotsend('-303799238', $telegram_message);
    $users = User::where('role_id', 1)->get();
    foreach ($users as $user) {
      $user->notify(new NewMessage($mail_message));
    }
    return redirect('/thank-you');
  }

  public function subscriberStore(CreateSubscribersRequest $request)
  {
    Newsletter::subscribe($request->subscriber_email);

    Subscribers::create($request->all());
    return redirect('/thank-you');
  }
  public function getProductList()
  {
    $products = Product::get()->pluck('product_title', 'id');
    return response()->json($products);
  }

  public function alarmerbotsend($chat_id, $message)
  {
    $ch = curl_init(env('TELEGRAM_API'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
      "chat_id" => $chat_id,
      "text" => $message,
    ));
    curl_exec($ch);
    curl_close($ch);
  }
}
