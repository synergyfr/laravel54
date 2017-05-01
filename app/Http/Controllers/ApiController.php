<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Illuminate\Http\Response as IlluminateResponse;

use Response;

class ApiController extends Controller
{
    // default
    protected $statusCode = 200;

    const HTTP_CREATED    = 201;
    const HTTP_NOT_FOUND  = 404;
    const HTTP_UNPROCESSABLE_ENTITY = 422;
    const HTTP_INTERNAL_SERVER_ERROR = 500;


    public function getStatusCode()
    {
    	return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
    	$this->statusCode = $statusCode;

    	// when you chain, you want to make sure you return the current object from the method
    	return $this;
    }

    public function respondNotFound($message = 'Not Found!') 
    {
        // constant HTTP_NOT_FOUND or ref then self::con
    	return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message);
    }

    public function respondInternalError($message = 'Internal Error!') {

    	return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message);
    	
    }

    // extra layer of abstraction
    public function respond($data, $headers = []) 
    {

    	return Response::json(
    		$data, $this->getStatusCode(), $headers
    	);

    }

    public function respondWithError($message)
    {
		return $this->respond([
    		'error' => [

    			'message'     => $message, 
    			'status_code' => $this->getStatusCode() 

    		]
    	]);
    }

    /**

    * @param $message

    * @return mixed

    */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'message'      => $message
        ]);
    }

    public function respondParameterFailed($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message);
    }


    public function respondWithPagination(Paginator $lessons, $data) {

        $data = array_merge($data, [
            'paginator' => [
                'total_count'   => $lessons->total(),
                'total_pages'   => ceil($lessons->total() / $lessons->perPage()),
                'current_page'  => $lessons->currentPage(),
                'limit'         => $lessons->perPage()
            ]
        ]);
        
        
        return $this->respond($data);

    }
    
}
