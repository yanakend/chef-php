<?php

class MemcacheManage 
{
	private static $memcache = NULL;

	public static function connect()
	{
		if (is_null(self::$memcache))
		{
			self::$memcache = new Memcached();
			self::$memcache->addServer("localhost", 11211);
		}
	}
	public static function get($key)
	{
		self::connect();
		return self::$memcache->get($key);
	}
	public static function set($key, $val, $expire = 2592000)
	{
		self::connect();
		return self::$memcache->set($key, $val);
	}
}
