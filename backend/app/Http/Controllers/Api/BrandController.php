<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SearchProductService;
use Illuminate\Http\Request;

class BrandController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): object {
        return SearchProductService::searchProductQuery($request, 'brands');
    }
}
