<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use App\Models\Staff;
use Illuminate\View\View;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserCreateFormRequest;
use App\Traits\ImageTrait;

class RegisteredUserController extends Controller
{
    // use ImageUploadTrait;
    use ImageTrait;
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserCreateFormRequest $request)
    {
        $status = $request->status == "off" ? "Inactive" : "Active";

        $userData = [
            'name' => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            'status' => $status,
            'user_type' => 'turf_owner',
            'nid' => $this->imageUpload($request, "nid", "/uploads/nid"),
            'password' => Hash::make($request->password),
        ];
        try {
            DB::transaction(function () use ($userData) {
                $user = User::create($userData);
                Staff::created([
                    'user_id' => $user->id
                ]);
            });
            session()->flash('success', "Successfully created");
        } catch (Exception $e) {
            session()->flash('warning', $e->getMessage());
        }


        return back();
    }
}
