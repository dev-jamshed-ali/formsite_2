<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteDocument;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = WebsiteDocument::where('is_shown', true)->get();
        return view('pages.document', compact('documents'));
    }
    
}
