<?php

class DownloadStatsPage extends Page {
}

class DownloadStatsPage_Controller extends Page_Controller {

	function DownloadStatsChartUrl() {
		$downloads = DataObject::get("DownloadPage");
		$values = array();
		$labels = array();
		foreach ($downloads as $download) {
			$values[] = $download->DownloadCount;
			$label = explode(" ", $download->Title);
			$labels[] = $label[0];
		}
		
		$url = "https://chart.googleapis.com/chart?cht=bvs&chd=t:" .
			implode(",", $values); //Chart data

		sort($values);

		$min = $values[0];
		$max = $values[count($values) - 1];

		$url = $url . "&chds=0,$max&chxr=1,$min,$max"; //Chart scale

		$url = $url . "&chs=400x200"; //Chart size

		$url = $url . "&chxt=x,y&chxl=0:|" .
			implode("|", $labels); //Chart labels

		$url = $url . "&chbh=50,15&chxs=0,FFFFFF,13,0,l,FFFFFF|1,FFFFFF,13,0,l,FFFFFF&chf=bg,s,000000&chtt=Download+Count&chts=FFFFFF,13";

		return $url;
	}

}

?>
