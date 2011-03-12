<?php

class DownloadStatsPage extends Page {
}

class DownloadStatsPage_Controller extends Page_Controller {

	function DownloadStatsChartUrl() {
		$downloads = DataObject::get("DownloadPage");
		$values = array();
		foreach ($downloads as $download) {
			$label = explode(" ", $download->Title);
			$temp = $label[0];
			print($temp);
			$values[$temp] = $download->DownloadCount;
		}

		rsort($values);
		
		$url = "https://chart.googleapis.com/chart?cht=bvs&chd=t:" .
			implode(",", array_values($values)); //Chart data
		
		$temp = array_values($values);

		$max = $temp[0];
		$min = $temp[count($values) - 1];

		$url = $url . "&chds=0,$max&chxr=1,$min,$max"; //Chart scale

		$url = $url . "&chs=400x200"; //Chart size

		$url = $url . "&chxt=x,y&chxl=0:|" .
			implode("|", array_keys($values)); //Chart labels

		$url = $url . "&chbh=50,15&chxs=0,FFFFFF,13,0,l,FFFFFF|1,FFFFFF,13,0,l,FFFFFF&chf=bg,s,000000&chtt=Download+Count&chts=FFFFFF,13";

		return $url;
	}

}

?>
