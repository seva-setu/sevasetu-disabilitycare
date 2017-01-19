<?php
	$url = "https://docs.google.com/spreadsheets/d/1C0f-t_LKZ0JGn-IbCAqb2WSLIpcPJHu2d3W6Z1PSbng/pub?gid=1170854807&single=true&output=csv";
	
	$data = get_csv_content($url);
	$is_valid = validate_data($data);
	
	$data_to_publish = array(1014, 817, 93, 6);
	
	if($is_valid){
		$all_count = get_all_counts($data);
		
		$data_to_publish[0] = $all_count;
		$data_to_publish[1] = get_counts($data, 4, $all_count);
		$data_to_publish[2] = get_counts($data, 5, $all_count);
		//$data_to_publish[3] = get_counts($data, 6, $all_count);
	}
	
	function get_all_counts($data){
		for($i=0; $i<count($data); $i++)
			if($data[$i][2] == '' and $data[$i][3] == '')
				break;
		return ($i+1);
	}
	
	function get_counts($data, $index, $max_count){
		$count 		= 0;
		for($i=0; $i<$max_count; $i++){
			if($data[$i][$index] != '')
				$count += 1;
		}
		return $count;
	}
	function get_csv_content($spreadsheet_url){
		if(!ini_set('default_socket_timeout', 15)) 
		echo "<!-- unable to change socket timeout -->";

		if (($handle = fopen($spreadsheet_url, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$spreadsheet_data[] = $data;
			}
			fclose($handle);
			return $spreadsheet_data;
		}
	}
	
	function validate_data($data){
		return true;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Seva Setu - Disability Care</title>
	
	<meta name="viewport" content="width=device-width">
	
	<meta name="description" content="Seva Setu's work done towards the differently abled in Bihar. Live statistics from our databanks.">
	
	<meta name="keywords" content="disability, divyaang, viklang, seva setu, bihar, ngo, social organization, self sufficiency, government schemes, service">
	
	<!-- a grid framework in 250 bytes? are you kidding me?! -->
	<link rel="stylesheet" href="css/grid.css">
	
	<!-- all the important responsive layout stuff -->
	<style>
		.container { max-width: 90em; }

		/* you only need width to set up columns; all columns are 100%-width by default, so we start
		   from a one-column mobile layout and gradually improve it according to available screen space */

		@media only screen{
			.logo 	 { width: 20%;   }
			.logo-half	 { width: 50%;   }
			.title 	 { width: 80%;   }
		}   
		   		   
		@media only screen and (min-width: 34em) {
			body{ padding-left: 3em; }
			.feature, .info { width: 50%; }
			
			.logo 	 { width: 20%;   }
			.logo-half	 { width: 50%;   }
			.title 	 { width: 60%;   }
			.imagebar {width: 33.3%;    }
		}

		@media only screen and (min-width: 54em) {
			body{ padding-left: 3em; }
			.content { width: 55%; }
			.sidebar { width: 33.33%; }
			.info    { width: 100%;   }
			
			.imagebar {width: 33.3%;    }
			.logo 	 { width: 30%;   }
			.logo-half	 { width: 70%;   }
			.title 	 { width: 60%;   }
		}

		@media only screen and (min-width: 76em) {
			body{ padding-left: 3em; }
			.content { width: 55%; } /* 7/12 */
			.sidebar { width: 35%; } /* 5/12 */
			.info    { width: 50%;    }
			
			.imagebar {width: 33.3%;    }
			.logo 	 { width: 25%;   }
			.logo-half	 { width: 35%;   }
			.title 	 { width: 60%;   }
		}
		
		@-moz-keyframes blink {
			0% {
				opacity:1;
			}
			50% {
				opacity:0;
			}
			100% {
				opacity:1;
			}
		} 

		@-webkit-keyframes blink {
			0% {
				opacity:1;
			}
			50% {
				opacity:0;
			}
			100% {
				opacity:1;
			}
		}
		/* IE */
		@-ms-keyframes blink {
			0% {
				opacity:1;
			}
			50% {
				opacity:0;
			}
			100% {
				opacity:1;
			}
		} 
		/* Opera and prob css3 final iteration */
		@keyframes blink {
			0% {
				opacity:1;
			}
			50% {
				opacity:0;
			}
			100% {
				opacity:1;
			}
		} 
		.blink-image {
			-moz-animation: blink normal 2s infinite ease-in-out; /* Firefox */
			-webkit-animation: blink normal 2s infinite ease-in-out; /* Webkit */
			-ms-animation: blink normal 2s infinite ease-in-out; /* IE */
			animation: blink normal 2s infinite ease-in-out; /* Opera and prob css3 final iteration */
		}
	</style>
	
	<!-- general boring stuff and some visual tweaks -->
	<link rel="stylesheet" href="css/screen.css">
	<script src = "http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col logo"><a href="http://sevasetu.org" class="image-link" target="__blank"><img src = "img/logo.jpg" height="90" width="65"/></a></div>
		
		<div class="col title"><h2 align="center">Seva Setu's programs for the differently abled</h2>
		
		<p class="desc1 boxify">One of <a href="http://sevasetu.org" class="inline-text" target="__blank"><b>Seva Setu's</b></a> sub-programs in its Citizen Care program is to ensure every differently abled person makes use of all the government benefits entitled to him. We routinely visit door-to-door and gather information on the differently abled in each household in rural Bihar. We then track and assist them in utilizing various schemes targeted at them. This webpage reflects numbers from our work done on the field.</p>
		</div>
	</div>
	<div class="row">
		<div class="col content">
			<h2 class="underline">Data from the field		
			<img src="img/pic.jpg" class="blink-image" title="Live from our databank" height="30" width="30" alt="dot"/>
			</h2>
		<table>
			<tr>
				<td  align="left" valign="middle"><h3>Number of differently abled surveyed</h3></td>
				<td  align="right"><h2><span class="label label-stats"><?php echo $data_to_publish[0];?></span></h2></td>
			</tr>
			<tr>
				<td colspan=2><p class="desc">Individuals in rural Bihar we surveyed with suspected disability (mental, physical)</p></td>
			</tr>
			
			<tr>
				<td align="left" valign="middle"><h3>Number not receiving any benefits</h3></td>
				<td align="right"><h2><span class="label label-stats"><?php echo $data_to_publish[1];?></span></h2></td>
			</tr>
			<tr>
				<td colspan=2><p class="desc">Those assessed by PHCs to be eligible but not receiving any government benefits</p></td>
			</tr>
			
			<tr>
				<td align="left" valign="middle"><h3>Number who have now begun receiving benefits</h3></td>
				<td align="right"><h2><span class="label label-processed"><?php echo $data_to_publish[2];?></span></h2></td>
			</tr>
			<tr>
				<td colspan=2><p class="desc">Those whom Seva Setu helps in submitting relevant paperwork and opening bank accounts to receive different benefits</p></td>
			</tr>
			
			<tr>
				<td align="left" valign="middle"><h3>Beneficiaries who have been treated at CRCs</h3></td>
				<td align="right"><h2><span class="label label-crc"><?php echo $data_to_publish[3];?></span></h2></td>
			</tr>
			<tr>
				<td colspan=2><p class="desc">Those receiving full government benefits whom we have connected to CRCs for other benefits like hearing aids, wheelchairs etc.</p></td>
			</tr>
			
		</table>
		</div>
		
		
		<div class="col sidebar">
			<div class="row">
				<div class="col logo-half">
				<a href="http://sevasetu.org/seva-setus-work-for-the-differently-able-part-i/" class="image-link" target="__blank">
				<img src="img/blog_pic1.png" height="120" width="120" alt="thumbnail"/>
				</a>
				</div>
				
				<h3><a href="http://sevasetu.org/seva-setus-work-for-the-differently-able-part-i/" class="header-text" target="__blank">Read our blog</href></a></h3>
				<p>
				Understand more about this process. What are some operational challenges? An analysis of  relevant policies in place. <a href="http://sevasetu.org/seva-setus-work-for-the-differently-able-part-i/" class="inline-text" target="__blank">[Link]</a>
				</p>
			</div>
			
			<!-- Add info about getting involved -->
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			
			<div id="body">
				&nbsp;
			</div>
			
			<div class="row">&nbsp;</div>
			<div class="row">&nbsp;</div>
			
			<div class="row">
				<div class="col"><h3 align="center">Get in touch</h3></div>
				<div class="col">Do you have thoughts? Appreciate our work? Please feel free to write to us on <i>programs@sevasetu.org</i></div>
			</div>
		</div>
		
		
	</div>
</div>


<script type="text/javascript">
	$(function() {	
        $(document.body).on('click', "#activities1", function(){
            $('#body').load("donate.html");
        });
		
		$(document.body).on('click', "#activities2", function(){
            $('#body').load("beginner.html");
        });

        $(document.body).on('click', "#activities3", function(){
            $('#body').load("advanced.html");
        });
		
		$(document.body).on('click', "#backagain", function(){
            $('#body').load("get_involved.html");
        });
		
		$( document ).ready(function() {
			$('#body').load("get_involved.html");
		});
    });
</script>
</body>
</html>
