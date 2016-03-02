	</div>
	<?php 
	mnk::debug($send);
		extract($send);
		$maxPagin = 8 ;
		/*
		p1 ==> etc1 etc3
		p2 ==> etc1 etc2 etc3
		p3 ==> etc1 etc2


			test
				si nbPagin < $maxPagin
					p1
				si curPagin+maxPagin > maxPagin
					p3
				si curPagin-maxPagin < 0
					p1
				si curPagin-maxPagin > maxPagin




		*/



		

		function ilinkPaginThis($i,$send){
			extract($send);

			$class = ($curPage==$i)?"curPage":"";
			$view = explode(":", $send['view_file_name']);
			$dataLink = "pack-view:".$view[1].",".$send['model_file_name']." .pagin.".$class;

			mnk::ilink($dataLink,$i, array_merge(array($i,$byPage),$send));
		}

		function ilinkPaginList($send,$start,$end){
			for ($i=$start;$i<=$end;$i++) {
				ilinkPaginThis($i,$send);
			}
		}



		function paginNext($send){
			extract($send);
			$view = explode(":", $send['view_file_name']);
			$dataLink = "pack-view:".$view[1].",".$send['model_file_name']." .pagin-next";

			

			if($curPage<$nbPage){
				mnk::ilink($dataLink,ui::rimg("arrow-right17",28,"242424"),array_merge(array($curPage+1,$byPage),$send));
			}

				//mnk::ilink("null .pagin-next",ui::rimg("arrow-right17",28,"242424")); 
		}
		function paginPrev($send){
			extract($send);
			$view = explode(":", $send['view_file_name']);
			$dataLink = "pack-view:".$view[1].",".$send['model_file_name']." .pagin-prev";
			if($curPage>1)
				mnk::ilink($dataLink,ui::rimg("arrow-left16",28,"242424"),array_merge(array($curPage-1,$byPage),$send));
		}

		function paginEtc($send,$start,$end,$tranche=10){
			echo '<a href="#" class="pagin-etc">...</a>';
		}

	 ?>

	<div class="pagin_footer">
	<?php 

		paginPrev($send);
	//	echo $curPage+$maxPagin;
		if($nbPage<$maxPagin){
			ilinkPaginList($send,1,$nbPage);
		}
		
		
		else if ($curPage+$maxPagin<$nbPage && $curPage>$maxPagin){
			
			ilinkPaginList($send,1,3);
			paginEtc($send,"","");
			ilinkPaginList($send,$curPage-$maxPagin/2+²1,$curPage+$maxPagin/2-1);
			paginEtc($send,"","");
			ilinkPaginList($send,$nbPage-2,$nbPage);
		}
		else if ($curPage<$maxPagin+1 ){
			
			ilinkPaginList($send,1,$maxPagin);
			paginEtc($send,"","");
			ilinkPaginList($send,$nbPage-2,$nbPage);
		}
		else if (($curPage+$maxPagin)>$maxPagin){
			
			ilinkPaginList($send,1,3);
			paginEtc($send,"","");
			ilinkPaginList($send,$nbPage-$maxPagin,$nbPage);
		}
		else{}
			

		paginNext($send);
	?>
	</div>
</div>