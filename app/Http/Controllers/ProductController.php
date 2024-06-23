<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function registration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'confirm_password' => Hash::make($request->password),
        ]);


        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

        /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // If the login is successful, redirect to the intended page or dashboard
            return redirect()->intended('/dashboard')->with('success', 'You are logged in successfully.');
        }
        // If the login attempt fails, redirect back to the login page with an error message
        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    public function navbar(Request $request) {
      
        $Product = Product::all(); // Fetch all students from the database
        return view('navbar', compact('Product'));
    }
   
    /**
     * Store a newly created resource in storage.
     */
    public function showForm(Request $request)
    {
        $Product = Product::all(); // Fetch all students from the database
        return view('form', compact('Product'));
    }

    public function uploadProfilePhoto(Request $request, $id)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $product = User::findOrFail($id);
        
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
    
            // Delete the old profile photo if exists
            if ($product->profile_photo) {
                Storage::delete('public/' . $product->profile_photo);
            }
    
            $product->profile_photo = $filename;
            $product->save();
        }
    
        return redirect()->back()->with('success', 'Profile photo uploaded successfully.');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function productform(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'marks' => 'required|string',
        ]);
        DB::table('products')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'password'=> $request->password,
            'marks'=> $request->marks
        ]);
        return redirect()->route('form')->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('updateform', compact('product'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function updateform(Request $request, string $id)
    {
        $student = Product::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->password = $request->input('password');
        $student->marks = $request->input('marks');
        $student->update();
        return redirect()->route('productform')->with('status','Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('productform')->withSuccess(__('Data delete successfully.'));
    }

    

}
