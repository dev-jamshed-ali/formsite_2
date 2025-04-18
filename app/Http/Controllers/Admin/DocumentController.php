<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\WebsiteDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
      
        $documents = WebsiteDocument::where('is_shown', true)->get();
        // dd($documents);
        return view('admin.websitedocuments.index', compact('documents',  ));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'document_file' => 'required|mimes:pdf|max:10240', // 10MB max
            ]);

            if ($request->hasFile('document_file')) {
                $file = $request->file('document_file');
                $ext = $file->getClientOriginalExtension();
                $final_name = 'document_' . time() . '.' . $ext;
                $file->move(public_path('uploads/'), $final_name);

                WebsiteDocument::create([
                    'name' => $request->document_name,
                    'pdf_url' => $final_name,
                    'is_shown' => true
                ]);
                // dd('ok');
                return redirect()->back()->with('success', 'Document uploaded successfully!');
            }

            return redirect()->back()->with('error', 'No file was uploaded.');
        } catch (\Exception $e) {
            Log::error('Document Upload Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error uploading document: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $document = WebsiteDocument::findOrFail($id);
        return view('admin.websitedocuments.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'document_name' => 'required|string|max:255',
                'document_file' => 'nullable|mimes:pdf|max:10240',
            ]);
            // dd($request->all());
            $document = WebsiteDocument::findOrFail($id);
            $data = [
                'name' => $request->document_name,
            ];

            if ($request->hasFile('document_file')) {
    
                $old_file_path = public_path('uploads/' . $document->pdf_url);
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }

            //   dd("ok")
                $file = $request->file('document_file');
                $ext = $file->getClientOriginalExtension();
                $final_name = 'document_' . time() . '.' . $ext;
                $file->move(public_path('uploads/'), $final_name);
                $data['pdf_url'] = $final_name;
            }

            $document->update($data);
            return redirect()->route('admin.websitedocuments.index')->with('success', 'Document updated successfully!');
        } catch (\Exception $e) {
            Log::error('Document Update Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating document: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $document = WebsiteDocument::findOrFail($id);
            
    
            $file_path = public_path('uploads/' . $document->pdf_url);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            $document->delete();
            return redirect()->back()->with('success', 'Document deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Document Delete Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting document: ' . $e->getMessage());
        }
    }

   
}
