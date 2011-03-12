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

		$foo = array();

		for ($i = 0; $i < count($labels); $i++) {
			$foo[$labels[$i]] = $values[$i];
		}

		rsort($foo);
		
		$url = "https://chart.googleapis.com/chart?cht=bvs&chd=t:" .
			implode(",", array_values($foo)); //Chart data

		$max = array_values($foo)[0];
		$min = array_values($foo)[count($foo) - 1];

		$url = $url . "&chds=0,$max&chxr=1,$min,$max"; //Chart scale

		$url = $url . "&chs=400x200"; //Chart size

		$url = $url . "&chxt=x,y&chxl=0:|" .
			implode("|", array_keys($foo)); //Chart labels

		$url = $url . "&chbh=50,15&chxs=0,FFFFFF,13,0,l,FFFFFF|1,FFFFFF,13,0,l,FFFFFF&chf=bg,s,000000&chtt=Download+Count&chts=FFFFFF,13";

		return $url;
	}

}

?>
