<?php

namespace human\yii2;

class Security extends \yii\base\Security
{
	public function generateRandomAlphanumericString($length = 32)
	{
		if (!is_int($length)) {
            throw new InvalidParamException('First parameter ($length) must be an integer');
        }
        if ($length < 1) {
            throw new InvalidParamException('First parameter ($length) must be greater than 0');
        }
        
        $string = '';
        
        while(strlen($string) < $length)
        {
	        $newPartOfString = self::generateRandomString($length - strlen($string));
	        
	        //Remove all dashes and underscores
	        $newPartOfString = str_replace(['-', '_'], '', $newPartOfString);
	        
	        $string .= $newPartOfString;
        }
        
        return $string;
	}
}