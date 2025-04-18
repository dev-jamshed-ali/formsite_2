<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Admin\GeneralSetting;
use App\Models\Admin\Admin;

class SdkController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $general_setting = GeneralSetting::first();
        return view('admin.sdk.index', compact('general_setting'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'role_id' => 'required',
                'file_path' => 'required|mimes:pdf|max:10240', // 10MB max
            ]);

            $general_setting = GeneralSetting::first();

            if ($request->hasFile('file_path')) {
                $file = $request->file('file_path');
                $ext = $file->getClientOriginalExtension();
                $final_name = 'sdk_' . time() . '.' . $ext;
                
                // Delete old file if exists
                if ($request->role_id == config('constants.admin_types.merchant')) {
                    if (!empty($general_setting->sdk_for_merchant)) {
                        $old_file = public_path('uploads/' . $general_setting->sdk_for_merchant);
                        if (file_exists($old_file) && is_file($old_file)) {
                            unlink($old_file);
                        }
                    }
                    $general_setting->sdk_for_merchant = $final_name;
                } elseif ($request->role_id == config('constants.admin_types.financial_institution')) {
                    if (!empty($general_setting->sdk_for_bank)) {
                        $old_file = public_path('uploads/' . $general_setting->sdk_for_bank);
                        if (file_exists($old_file) && is_file($old_file)) {
                            unlink($old_file);
                        }
                    }
                    $general_setting->sdk_for_bank = $final_name;
                }

                $file->move(public_path('uploads/'), $final_name);
                $general_setting->save();
                
                return redirect()->back()->with('success', 'SDK uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No file was uploaded.');
        } catch (\Exception $e) {
            Log::error('SDK Upload Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error uploading SDK: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        // return view('admin.sdk.edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.sdk.index')->with('success', 'Document updated successfully!');
    }

    public function destroy($type)
    {
        try {
            $general_setting = GeneralSetting::first();
            
            if ($type === 'merchant') {
                $file_path = public_path('uploads/' . $general_setting->sdk_for_merchant);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $general_setting->sdk_for_merchant = null;
            } elseif ($type === 'bank') {
                $file_path = public_path('uploads/' . $general_setting->sdk_for_bank);
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
                $general_setting->sdk_for_bank = null;
            }
            
            $general_setting->save();
            return redirect()->back()->with('success', 'SDK deleted successfully!');
        } catch (\Exception $e) {
            Log::error('SDK Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting SDK: ' . $e->getMessage());
        }
    }

    public function viewSdk()
    {
        try {
            // Check if user has proper role
            if (!in_array(session('role_id'), [
                config('constants.admin_types.merchant'),
                config('constants.admin_types.financial_institution')
            ])) {
                return redirect()->back()->with('error', 'You do not have permission to access this resource.');
            }

            $general_setting = GeneralSetting::first();
            $admin = Admin::find(session('id'));
            
            // Check if SDK exists for the user's role
            $pdf_file = session('role_id') == config('constants.admin_types.financial_institution')
                ? $general_setting->sdk_for_bank
                : $general_setting->sdk_for_merchant;

            if (!$pdf_file) {
                return view('admin.sdk.view', compact('general_setting', 'admin'))
                    ->with('warning', 'No SDK documentation is available for your role.');
            }

            return view('admin.sdk.view', compact('general_setting', 'admin'));
        } catch (\Exception $e) {
            Log::error('SDK View Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error accessing SDK documentation.');
        }
    }

    public function agreeSdk(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|string',
                'type' => 'required|in:merchant,bank'
            ]);

            // Verify file exists
            $file_path = public_path('uploads/' . $request->file);
            if (!file_exists($file_path)) {
                return response()->json([
                    'success' => false,
                    'message' => 'File not found'
                ], 404);
            }

            // Update the admin's SDK check status
            $admin = Admin::find(session('id'));
            if ($admin) {
                $admin->is_sdk_checked = true;
                $admin->save();
            }

            return redirect()->route('admin.sdk.view')->with('success', 'SDK agreement saved successfully!');
        } catch (\Exception $e) {
            Log::error('SDK Agreement Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error processing agreement: ' . $e->getMessage());
        }
    }
}
