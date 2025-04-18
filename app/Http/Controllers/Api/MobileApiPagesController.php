<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use Symfony\Component\HttpFoundation\Response as HttpResponse;  
use App\Models\Admin\WhyChooseItem;

class MobileApiPagesController extends Controller
{
    public function pageData($page_title)
    {
        $whyChooseItems = WhyChooseItem::select('id', 'name', 'slug', 'description', 'page_content', 'photo')
            ->where('slug', $page_title)
            ->first();
        
        if ($whyChooseItems) {
            return response()->json([
                'status' => 'success',
                'data' => $whyChooseItems
            ], HttpResponse::HTTP_OK);
        }

        $searchTitle = str_replace('_', ' ', $page_title);
        $servicesItems = Service::select('id', 'name', 'slug', 'description', 'short_description', 'photo', 'seo_title', 'seo_meta_description')
            ->where('slug', $searchTitle)
            ->first();

        if ($servicesItems) {
            return response()->json([
                'status' => 'success',
                'data' => $servicesItems
            ], HttpResponse::HTTP_OK);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Data not found'
        ], HttpResponse::HTTP_NOT_FOUND);
    }
}
