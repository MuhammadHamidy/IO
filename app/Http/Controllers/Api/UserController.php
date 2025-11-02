<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginOutbound(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ]);

            Log::info('Login with data: ', [
                'data' => [$request->name, $request->email, $request->password],
            ]);

            $user = User::updateOrCreate(['email' => $request->email], [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => 2,
                'user_type' => 'outbound',
                'remember_token' => Str::random(10),
                'email_verified_at' => null,
            ]);

            Auth::login($user, $request->remember);
            
            
            $redirectUrl = $user->role_id === 1 ? route('admin.dashboard') : route('home');
            
            return response()->json([
                'status' => true,
                'message' => 'Login berhasil',
                'redirect' => $redirectUrl
            ]);   

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Login gagal',
                'error' => $e->getMessage()
            ]);   
        }
    }

    public function loginInbound(Request $request) {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            Log::info('Login Inbound attempt dengan credentials:', [
                'email' => $request->email,
                'password_length' => strlen($request->password)
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                Log::info('User tidak ditemukan dengan email tersebut');
                return response()->json([
                    'status' => false,
                    'message' => 'Email atau password tidak valid'
                ], 401);
            }

            // Update user_type jika belum ada
            if (!$user->user_type) {
                $user->user_type = 'inbound';
                $user->save();
            }

            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();

                $redirectUrl = Auth::user()->role_id === 1 ? route('admin.dashboard') : route('home');

                return response()->json([
                    'status' => true,
                    'message' => 'Login berhasil',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Email atau password tidak valid',
            ], 401);

        } catch (\Exception $e) {
            Log::error('Login error:', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Login gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed'],
            ]);
            
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role_id' => 2,
                'user_type' => 'inbound', // Default untuk registrasi inbound
                'remember_token' => Str::random(10),
                'email_verified_at' => null,
            ]);
            Log::info('Registration successful:', [
                'name' => $user->name,
                'email' => $user->email,
                'user_type' => $user->user_type
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'user' => $user
            ], 201);

        } catch (\Exception $e) {
            Log::info('Registration failed:', [
                'error' => $e
            ]);
            return response()->json([
                'status' => false,
                'message' => 'Registration failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            Log::info('Login attempt dengan credentials:', [
                'email' => $request->email,
                'password_length' => strlen($request->password)
            ]);

            $user = User::where('email', $request->email)->first();
            if (!$user) {
                Log::info('User tidak ditemukan dengan email tersebut');
                return response()->json([
                    'status' => false,
                    'message' => 'Email atau password tidak valid'
                ], 401);
            }

            if (Auth::attempt($credentials, $request->remember)) {
                $request->session()->regenerate();

                
                $redirectUrl = Auth::user()->role_id === 1 ? route('admin.dashboard') : route('home');

                return response()->json([
                    'status' => true,
                    'message' => 'Login berhasil',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'status' => false,
                'message' => 'Email atau password tidak valid',
            ], 401);

        } catch (\Exception $e) {
            Log::error('Login error:', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Login gagal',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Anda telah berhasil keluar dari akun ini');
    }

    public function checkDocuments(Request $request)
    {
        try {
            $user = $request->user();
            
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            return response()->json([
                'status' => true,
                'cv_path' => !empty($user->cv_path),
                'transcript_path' => !empty($user->transcript_path),
                'toefl_path' => !empty($user->toefl_path),
                'integrity_letter_path' => !empty($user->integrity_letter_path),
            ]);

        } catch (\Exception $e) {
            Log::error('Error checking documents:', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Failed to check documents',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function checkDocumentsWeb()
    {
        try {
            $user = Auth::user();
            
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'User not authenticated'
                ], 401);
            }

            return response()->json([
                'status' => true,
                'cv_path' => !empty($user->cv_path),
                'transcript_path' => !empty($user->transcript_path),
                'toefl_path' => !empty($user->toefl_path),
                'integrity_letter_path' => !empty($user->integrity_letter_path),
            ]);

        } catch (\Exception $e) {
            Log::error('Error checking documents:', ['error' => $e->getMessage()]);
            return response()->json([
                'status' => false,
                'message' => 'Failed to check documents',
                'error' => $e->getMessage()
            ], 500);
        }
    }


}
