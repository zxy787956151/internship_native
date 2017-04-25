<?php 
	trait ModuleModel{
		//无限级分类处理
		//$num 为最顶级id名
		//※※※此处必须引用传递数组,且递归时候直接写$arr即可无需再写&※※※
		public function DFS(&$arr,$num=0){
			foreach ($arr as $k => $v) {
				if ($v['parentid'] == $arr["$num"]['id']) {
					$this->DFS($arr,$k);
					$arr["$num"]['child'][]=$arr["$k"];
					unset($arr["$k"]);
				}
			}
			return $arr;
		}

		public function showDfs($arr,&$brr=array(),$level=1,$sign='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'){
			foreach ($arr as $k => $v) {
				if ($level!=1) {
					for ($i=1; $i <$level ; $i++) { 
						@$element .= $sign;
					}
				}
				@$element .= $v['title'];
			
				$brr[]['title'] = $element;
				$num = count($brr)-1;
				$brr["$num"]['id'] = $v['id'];
				if (isset($v['child'])) {
					$element = null;
					$this->showDfs($v['child'],$brr,($level+1));
				}
				$element = null;
			}
			return $brr;
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