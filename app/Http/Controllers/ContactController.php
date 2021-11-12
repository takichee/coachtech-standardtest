<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('admin/index', ['contacts' => $contacts]);
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $created_at_start = $request->input('created_at_start');
        $created_at_end = $request->input('created_at_end');

        if ($fullname != '') {
            $query->where('fullname', 'like', '%'.$fullname.'%');
        }
        if ($gender == '1') {
            $query->where('gender', 1);
        }
        if ($gender == '2') {
            $query->where('gender', 2);
        }
        if ($created_at_start != '' && $created_at_end != '') {
            $query->whereDate('created_at', '>=', $created_at_start)->whereDate('created_at', '<=', $created_at_end);
        }
        if ($created_at_start != '' && $created_at_end == '') {
            $query->whereDate('created_at', '>=', $created_at_start);
        }
        if ($created_at_end != '' && $created_at_start == '') {
            $query->whereDate('created_at', '<=', $created_at_end);
        }
        if ($email != '') {
            $query->where('email', 'like', '%'.$email.'%');
        }
        else {
            $contacts = Contact::paginate(10);
        }

        $contacts = $query->paginate(10);

        return view('admin/index',
            [
                'contacts' => $contacts,
                'fullname' => $fullname,
                'gender' => $gender,
                'email' => $email,
                'created_at_start' => $created_at_start,
                'created_at_end' => $created_at_end
            ]);
    }

    public function destroy ($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect('admin');
    }

    public function reset ()
    {
        $contacts = Contact::paginate(10);
        return view('admin/index', ['contacts' => $contacts]);
    }
}
