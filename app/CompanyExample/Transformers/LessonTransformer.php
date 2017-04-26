<?php namespace App\CompanyExample\Transformers;

class LessonTransformer extends Transformer {

	/**

	* Transform a lesson

	*

	* @param $lesson

	* @return array

	*/

	// Because every subclass will need to offer a tranform method()
	// that means we need to go to our Transformer abstract class
	// and require that of them

	// dedicated lesson tranformer class
	// has one responsibility

	// public, not private
	public function transform($lesson) 
    {
        return [
            'title'             => $lesson['title'],
            'body'              => $lesson['body'],
            'active'            => (boolean) $lesson['some_bool']
        ];
    }

}