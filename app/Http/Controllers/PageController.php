<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\Account as AccountModel;
use App\Models\Ebook as EbookModel;
use App\Models\Order as OrderModel;

class PageController extends Controller
{
    public function detail($title)
    {
        $ebook = EbookModel::where('title', $title)
                            ->get();

        return view('detail', compact('ebook'));
    }

    public function cart() 
    {
        $cart = OrderModel::join('account', 'account.id', 'account_id')
                            ->join('ebook', 'ebook.id', 'ebook_id')
                            ->where('account_id', auth()->user()->id)
                            ->get(['order.id', 'title']);

        return view('cart', compact('cart'));
    }

    public function rent(Request $request) 
    {
        OrderModel::create([
            'account_id' => auth()->user()->id,
            'ebook_id' => $request->ebook_id,
        ]);

        return redirect('cart');
    }

    public function cartDelete(Request $request)
    {
        OrderModel::where('id', $request->id)
                    ->delete();

        return redirect('cart');
    }

    public function submit()
    {
        OrderModel::where('account_id', auth()->user()->id)
                    ->delete();

        return redirect('success');
    }

    public function profile()
    {
        $account = AccountModel::where('id', auth()->user()->id)
                                ->get();

        return view('profile', compact('account'));
    }

    public function saved()
    {
        return view('saved');
    }

    public function success()
    {
        return view('success');
    }

    public function saveProfile(Request $request)
    {
        
        $data = $request->validate([
            'firstname' => ['required', 'alpha', 'max:25'],
            'middlename' => ['nullable', 'alpha', 'max:25'],
            'lastname' => ['required', 'alpha', 'max:25'],
            'gender_id' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'display_picture_link' => ['required', 'mimes:jpg,jpeg,png'],
        ]);

        // dd($data);

        $image =  $request->file('display_picture_link');
        $name = time() . '.' . $image->getClientOriginalExtension();;
        $location = 'image/' . $name;
        Storage::putFileAs('public/image', $image, $name);
        $data['display_picture_link'] = $location;

        if ($data['password'] != auth()->user()->password) {
            $data['password'] = Hash::make($request->password);
        }

        AccountModel::where('id', auth()->user()->id)
                    ->update($data);

        return redirect('saved');
    }

    public function maintenance()
    {
        $account = AccountModel::join('role', 'role.id', 'role_id')
                                ->get(['account.id', 'account.firstname', 'account.middlename', 'account.lastname', 'role.role_desc']);

        return view('maintenance', compact('account'));
    }

    public function userDelete($id)
    {
        AccountModel::where('id', $id)
                    ->delete();

        return redirect('maintenance');
    }

    public function updateRole($id)
    {
        $account = AccountModel::join('role', 'role.id', 'role_id')
                    ->where('account.id', $id)
                    ->get(['account.id', 'account.firstname', 'account.middlename', 'account.lastname', 'account.role_id', 'role.role_desc']);
        
        return view('updateRole', compact('account'));
    }

    public function saveRole(Request $request, $id)
    {
        $account = AccountModel::join('role', 'role.id', 'role_id')
                                ->where('account.id', $id)
                                ->update(['role_id' => $request->role_id]);

        return redirect('maintenance');
    }
}
