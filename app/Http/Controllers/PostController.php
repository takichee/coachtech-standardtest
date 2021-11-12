<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Rules\PostCodeRule;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $firstName = $request->session()->get('firstName');
        $lastName = $request->session()->get('lastName');
        $gender = $request->session()->get('gender');
        $email = $request->session()->get('email');
        $postcode = $request->session()->get('postcode');
        $address = $request->session()->get('address');
        $building_name = $request->session()->get('building_name');
        $opinion = $request->session()->get('opinion');

        return view('contact', compact(
            'firstName',
            'lastName',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion'
        ));
    }
    
    public function create(Request $request)
    {
        $validated_rule = [
            'firstName' => 'required|max:120',
            'lastName' => 'required|max:120',
            'email' => 'required | max:120 | email',
            'postcode' => ['required', 'max:8', new PostCodeRule],
            'address' => 'required|max:120',
            'opinion' => 'required|max:120'
        ];

        $this->validate($request, $validated_rule);

        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $gender = $request->gender;
        $email = $request->email;
        $postcode = $request->postcode;
        $address = $request->address;
        $building_name = $request->building_name;
        $opinion = $request->opinion;

        if (preg_match("/^[0-9]{3}-[0-9]{4}$/", $postcode)) {
            $postcode = $postcode ;
        } else {
            $postcode = mb_convert_kana($postcode, "an");
        }

        $request->session()->put('firstName', $firstName);
        $request->session()->put('lastName', $lastName);
        $request->session()->put('gender', $gender);
        $request->session()->put('email', $email);
        $request->session()->put('postcode', $postcode);
        $request->session()->put('address', $address);
        $request->session()->put('building_name', $building_name);
        $request->session()->put('opinion', $opinion);

        return redirect('/confirm');
    }

    public function show(Request $request)
    {
        $firstName = $request->session()->get('firstName');
        $lastName = $request->session()->get('lastName');
        $gender = $request->session()->get('gender');
        $email = $request->session()->get('email');
        $postcode = $request->session()->get('postcode');
        $address = $request->session()->get('address');
        $building_name = $request->session()->get('building_name');
        $opinion = $request->session()->get('opinion');
        $fullname = $lastName.' '.$firstName;
        
        if ($gender == '1') {
            $gender = '男性';
        } else {
            $gender = '女性';
        }

        return view('confirm', compact(
            'firstName',
            'lastName',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion',
            'fullname'
        ));

    }

    public function post(Request $request)
    {
        $firstName = $request->session()->get('firstName');
        $lastName = $request->session()->get('lastName');
        $gender = $request->session()->get('gender');
        $email = $request->session()->get('email');
        $postcode = $request->session()->get('postcode');
        $address = $request->session()->get('address');
        $building_name = $request->session()->get('building_name');
        $opinion = $request->session()->get('opinion');
        $fullname = $lastName.' '.$firstName;

        Contact::create([
            'fullname' => $fullname,
            'gender' => $gender,
            'email' => $email,
            'postcode' => $postcode,
            'address' => $address,
            'building_name' => $building_name,
            'opinion' => $opinion
        ]);

        $request->session()->forget([
            'firstName',
            'lastName',
            'gender',
            'email',
            'postcode',
            'address',
            'building_name',
            'opinion'
        ]);

        return view('thanks');
    }
}
