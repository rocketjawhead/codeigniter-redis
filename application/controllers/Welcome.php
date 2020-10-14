<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		echo "string";
	}

	public function one_hit_redis()
	{
		//membuat list dengan nama redis_list dan mengisi value "1"
		$data = $this->redis->sadd('redis_list', "1");
		if($data){
			echo "success create redis list";
		}else{
			echo "failed";
		}
	}

	public function bulk_hit_redis()
	{
		//membuat list dengan nama redis_list dan mengisi value random antara 1-24
		for ($i=1; $i < 25; $i++) { 
			$data = $this->redis->sadd('redis_list', $i);
		}

		if($data){
			echo "success create bulk redis list";
		}else{
			echo "failed";
		}

	}

	public function get_redis_list()
	{
		//melihat value didalam redis_list
		var_dump( $this->redis->sort("redis_list") );
	}

	public function getlast_redis_list()
	{
		//melihat value last order didalam redis_list
		$data = $this->redis->sort("redis_list","limit","0","1")[0] ;
		if($data)
		{
			var_dump($data);
		}else{
			echo "redis list not found";
		}
	}

	public function delete_redis_list()
	{
		//menghapus value "1" didalam redis_list
		$value_redis = "2";
		$data = $this->redis->srem("redis_list",$value_redis);
		if($data){
			echo "success delete value ".$value_redis." in redis list";
		}else{
			echo "failed";
		}
	}

	public function empty_redis_list()
	{
		$data = $this->redis->flushall();
		if($data){
			echo "success redis list";
		}else{
			echo "failed";
		}	
	}
}
