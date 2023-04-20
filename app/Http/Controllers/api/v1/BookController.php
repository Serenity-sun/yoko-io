<?php

namespace App\Http\Controllers\api\v1;

use App\Services\BookService;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function __construct(
        readonly BookService $service
    ){}

    public function index(Request $request)
    {
    }
}
