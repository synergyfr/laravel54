<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

use App\Lesson;

use Illuminate\Support\Facades\Input;

use App\CompanyExample\Transformers\LessonTransformer;

class LessonsController extends ApiController
{

    /**

    * @var CompanyExample\Transformers\LessonTransformer

    */

    protected $lessonTransformer;

    function __construct(LessonTransformer $lessonTransformer)
    {
        $this->lessonTransformer = $lessonTransformer;

        $this->middleware('auth.basic', ['only' => ['store']]);
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns as json
        // api/v1/lessons

        // 1. All is bad - the query could become a problem when there are many data
        // 2. No way to attach meta data
        // 3. 100% mimics database structure - Hide the data
        // Linking db structure to the API output
        // 4. if structure changes, could affect all people quering the api
        // 4. No way to signal headers/response codes

        $lessons = \App\Lesson::all();

        // get_class()
        // get_class_methods()

        // 200 default error code value - set the status code with chain if you want to
        return $this->respond([
            'data' => $this->lessonTransformer->transformCollection($lessons->all())
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = \App\Lesson::find($id);

        if (! $lesson) {

            return $this->respondNotFound('Lesson does not exist.');

        }

        // 200 default error code value - set the status code with chain if you want to
        return $this->respond([
            'data' => $this->lessonTransformer->transform($lesson)
        ]);

    }

    public function store() {
        
        // need to be authorized to create a lesson
        // if you use authentication, you must use SSL !

        if ( ! Input::get('title') or ! Input::get('body')) {

            // 400 - bad request (this)
            // 403 - forbidden
            // 422 - unprocessable entity (this)

            // response, number, message

            return $this->respondParameterFailed('Parameters failed validation for a lesson.');


        }

        Lesson::create(Input::all());

        return $this->respondCreated('Lesson successfully created.');

        //if ( !$request->get('title') || !$request->get('body') ) {

        //}

    }

}
