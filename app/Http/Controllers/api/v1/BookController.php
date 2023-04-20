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

    /**
     * @param Request $request
     * @return array
     * @throws HttpClientException
     */
    public function index(Request $request): array
    {
        $requestData = $request->all();

        if (isset($requestData['data'])) {
            $requestData = $requestData['data'];
        }

        foreach ($requestData as $data) {
            $validator = Validator::make($data, [
                'title' => 'string',
                'name' => 'string',
                'description' => 'string',
                'descr' => 'string',
                'createdAt' => 'date',
                'author' => 'string',

                'title_or_name' => 'required_without_all:title,name',
                'description_or_descr' => 'required_without_all:description,descr',
                'createdAt_or_author' => 'required_without_all:createdAt,author',
            ]);

            if($validator->fails()) {
                throw new HttpClientException($validator->errors()->first(), 422);
            }
        }

        return $this->service->getBooks($requestData);
    }
}
