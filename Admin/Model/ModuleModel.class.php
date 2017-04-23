<?php 
	trait ModuleModel{
		//无限级分类处理
		//$num 为最顶级id名
		public function DFS($arr,$num=0){
			foreach ($arr as $v) {
				if ($v['parentid'] == $num) {
					$child = $v['id'];
					$this->DFS($arr,$child);
					$arr["$num"]['child'][]=$arr["$child"];
				}
			}
			return $arr;
		}
		// public function infinite($arr){
		// 	var_dump($this->getmaxdim($arr));
		// 	foreach ($arr as $k1 => $v1) {
		// 		foreach ($arr as $k2 => $v2) {
		// 			//找有没有父级
		// 			if (@$v1['parentid']==$v2['id']) {
		// 				$arr["$k2"]['child'][] = $arr["$k1"];
		// 				unset($arr["$k1"]);						
		// 			}
		// 		}
		// 	}
		// 	return $arr;
		// }	

		public function getmaxdim($vDim)
		{
		  if(!is_array($vDim)) return 0;
		  else
		  {
		    $max1 = 0;
		    foreach($vDim as $item1)
		    {
		     $t1 = $this->getmaxdim($item1);
		     if( $t1 > $max1) $max1 = $t1;
		    }
		    return $max1 + 1;
		  }
		}
	}
 ?>