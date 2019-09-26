

<style type="text/css">
 

		a, a:visited {
			color: #4183C4;
			text-decoration: none;
		}

		a:hover {
			text-decoration: underline;
		}

		pre, code {
			font-size: 12px;
		}

		pre {
			width: 100%;
			overflow: auto;
		}

		small {
			font-size: 90%;
		}

		small code {
			font-size: 11px;
		}

		.placeholder {
			outline: 1px dashed #4183C4;
			/*-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			margin: -1px;*/
		}

		.mjs-nestedSortable-error {
			background: #fbe3e4;
			border-color: transparent;
		}

		ol {
			margin: 0;
			padding: 0;
			padding-left: 30px;
		}

		ol.sortable, ol.sortable ol {
			margin: 0 0 0 25px;
			padding: 0;
			list-style-type: none;
		}

		ol.sortable {
			margin: 4em 0;
		}

		.sortable li {
			margin: 5px 0 0 0;
			padding: 0;
		}

		.sortable li div  {
			border: 1px solid #d4d4d4;
			-webkit-border-radius: 3px;
			-moz-border-radius: 3px;
			border-radius: 3px;
			border-color: #D4D4D4 #D4D4D4 #BCBCBC;
			padding: 6px;
			margin: 0;
			cursor: move;
			background: #f6f6f6;
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #ededed 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: -o-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: -ms-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			background: linear-gradient(to bottom,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
		}

		.sortable li.mjs-nestedSortable-branch div {
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #f0ece9 100%);
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#f0ece9 100%);

		}

		.sortable li.mjs-nestedSortable-leaf div {
			background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #bcccbc 100%);
			background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#bcccbc 100%);

		}

		li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
			border-color: #999;
			background: #fafafa;
		}

		.disclose {
			cursor: pointer;
			width: 10px;
			display: none;
		}

		.sortable li.mjs-nestedSortable-collapsed > ol {
			display: none;
		}

		.sortable li.mjs-nestedSortable-branch > div > .disclose {
			display: inline-block;
		}

		.sortable li.mjs-nestedSortable-collapsed > div > .disclose > span:before {
			content: '+ ';
		}

		.sortable li.mjs-nestedSortable-expanded > div > .disclose > span:before {
			content: '- ';
		}

		h1 {
			font-size: 2em;
			margin-bottom: 0;
		}

		h2 {
			font-size: 1.2em;
			font-weight: normal;
			font-style: italic;
			margin-top: .2em;
			margin-bottom: 1.5em;
		}

		h3 {
			font-size: 1em;
			margin: 1em 0 .3em;;
		}

		p, ol, ul, pre, form {
			margin-top: 0;
			margin-bottom: 1em;
		}

		dl {
			margin: 0;
		}

		dd {
			margin: 0;
			padding: 0 0 0 1.5em;
		}

		code {
			background: #e5e5e5;
		}

		input {
			vertical-align: text-bottom;
		}

		.notice {
			color: #c33;
		}

	</style>
<?php

//echo get_ol($pages);
//dump($pages);
//echo json_encode($pages);
//die();

function get_ol($array, $child = FALSE){
	$str = "";
	if(count($array)){
		$str .= $child == FALSE ? "<ol class='sortable'>" : '<ol>';
		
		foreach($array as $item){
			
			$str .= "<li id='list_".$item['id']."'>";
			$str .= "<div>".$item['title']."</div>";
			
				//child?
				if(isset($item['children']) && count($item['children'])){
					$str .= get_ol($item['children'],TRUE);
				}
			
			$str .= '</li>'. PHP_EOL;
			
		}
		
		$str .= '</ol>'. PHP_EOL;
	}
	return $str;
}

echo get_ol($pages);

?>


<script type="text/javascript">
//alert('setan');
// $(document).ready(function(){
	 	$('.sortable').nestedSortable({
		handle:'div',
		items:'li',
		toleranceElement: '> div',
		maxLevels:10
	});
// });

 
</script>

