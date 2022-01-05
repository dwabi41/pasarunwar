<?php 
    function conHari($hari){ 
        switch($hari){
            case 'Sun':
                $getHari = "Minggu";
                break;
            case 'Mon': 
                $getHari = "Senin";
                break;
            case 'Tue':
                $getHari = "Selasa";
                break;
            case 'Wed':
                $getHari = "Rabu";
                break;
            case 'Thu':
                $getHari = "Kamis";
                break;
            case 'Fri':
                $getHari = "Jumat";
                break;
            case 'Sat':
                $getHari = "Sabtu";
                break;
            default:
                $getHari = "Salah"; 
                break;
        }
        return $getHari;
    }
    function format_date_in($option_format, $date){
    	list($yyyy, $mm, $dd) = explode('-', $date);
    	$ary_month = array("01" => "Januari","02" => "Februari","03" => "Maret","04" => "April","05" => "Mei","06" => "Juni","07" => "Juli","08" => "Agustus","09" => "September","10" => "Oktober","11" => "November","12" => "Desember",);
    	foreach($ary_month as $key => $val){
    		if($key==$mm){$mm = $val;}
    	}			
    	switch($option_format){
    		case "1"	:
    			$date = $mm." ".$dd.", ".$yyyy;
    			break;
    		case "2"	:
    			$date = $dd." ".$mm." ".$yyyy;
    			break;	
    	}
    	return 	$date;	
    }  
    function yt_id($url) {
        	$pattern = 
        		'%^# Match any youtube URL
        		(?:https?://)?  # Optional scheme. Either http or https
        		(?:www\.)?      # Optional www subdomain
        		(?:             # Group host alternatives
        		  youtu\.be/    # Either youtu.be,
        		| youtube\.com  # or youtube.com
        		  (?:           # Group path alternatives
        			/embed/     # Either /embed/
        		  | /v/         # or /v/
        		  | /watch\?v=  # or /watch\?v=
        		  )             # End path alternatives.
        		)               # End host alternatives.
        		([\w-]{10,12})  # Allow 10-12 for 11 char youtube id.
        		$%x'
        		;
        	$result = preg_match($pattern, $url, $matches);
        	if ($result) {
        		return $matches[1];
        	}
        	return false;
        }
    function cutText($text, $length, $mode = 2)
    {
    	if ($mode != 1)
    	{
    		$char = $text{$length - 1};
    		switch($mode)
    		{
    			case 2: 
    				while($char != ' ') {
    					$char = $text{--$length};
    				}
    			case 3:
    				while($char != ' ') {
    					$char = $text{++$num_char};
    				}
    		}
    	}
    	return substr($text, 0, $length);
    }
?>