<?php

// namespace App\Http\Controllers;

// use App\Models\Account;
// use Illuminate\Http\Request;

// class AccountController extends Controller
// {
//     // Display a listing of accounts
//     public function index()
//     {
//         $accounts = Account::all();
//         return response()->json($accounts);
//     }

//     // Store a newly created account
//     public function store(Request $request)
//     {
//         $validatedData = $request->validate([
//             'UserName' => 'required|string|max:100',
//             'StudentCode' => 'nullable|string|max:20',
//             'Password' => 'required|string',
//             'Email' => 'nullable|email|max:100',
//             'Points' => 'nullable|integer',
//             'IsActive' => 'nullable|integer',
//             'Role' => 'nullable|integer',
//         ]);

//         $account = Account::create($validatedData);
//         return response()->json($account, 201);
//     }

//     // Display the specified account
//     public function show($id)
//     {
//         $account = Account::findOrFail($id);
//         return response()->json($account);
//     }

//     // Update the specified account
//     public function update(Request $request, $id)
//     {
//         $validatedData = $request->validate([
//             'UserName' => 'sometimes|required|string|max:100',
//             'StudentCode' => 'nullable|string|max:20',
//             'Password' => 'sometimes|required|string',
//             'Email' => 'nullable|email|max:100',
//             'Points' => 'nullable|integer',
//             'IsActive' => 'nullable|integer',
//             'Role' => 'nullable|integer',
//         ]);

//         $account = Account::findOrFail($id);
//         $account->update($validatedData);
//         return response()->json($account);
//     }

//     // Remove the specified account
//     public function destroy($id)
//     {
//         $account = Account::findOrFail($id);
//         $account->delete();
//         return response()->json(['message' => 'Account deleted successfully']);
//     }
// }
?>