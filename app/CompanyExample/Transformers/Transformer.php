<?php namespace App\CompanyExample\Transformers;

	abstract class Transformer {


		/**

		* Transform a collection of lessons

		*

		* @param $lessons

		* @return array

		*/

		// if you want to test private methods, clear indication private methods should be extracted
		// to their own classes, and made public

		// expects array, not required to cast to array
		public function transformCollection(array $items)
    	{
        	return array_map([$this, 'transform'], $items);
    	}

    	// every subclass will require a transform method
    	public abstract function transform($item);

	}

?>