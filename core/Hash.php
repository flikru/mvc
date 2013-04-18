<?php

class Hashss
{
	public static function create($algo, $data, $salt)
	{
        return md5($data);
		$context = hash_init($algo, HASH_HMAC, $salt);
		hash_update($context, $data);
		
		//return hash_final($context);

		
	}
	
}
?>