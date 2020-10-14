###################
Codeigniter Redis
###################

*******************
One Hit Redis
*******************

$this->redis->sadd('redis_list', "1");

******************
Bulk Hit Redis
******************

for ($i=1; $i < 25; $i++) { 
			$data = $this->redis->sadd('redis_list', $i);
		}

*******************
Get Redis List
*******************

var_dump( $this->redis->sort("redis_list") );

********************
Get Last Redis List
********************

var_dump( $this->redis->sort("redis_list","limit","0","1")[0] );

******************
Delete Redis List
******************

$value_redis = "2";
$this->redis->srem("redis_list",$value_redis);

*****************
Empty Redis List
*****************

$this->redis->flushall();

**********
More Info
**********
Trees Code Indonesia
www.trees-code.com
