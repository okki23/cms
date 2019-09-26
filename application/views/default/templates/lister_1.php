<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body>
<?php
function get_list($array,$child = FALSE){
    $str = '';
    
    if(count($array)){
        $str .= $child == FALSE ? "<ul>" : '<ul>';
       
        foreach($array as $item){
            
            $str .= "<li>".$item['name'].' - '.$item['comment'];
             
             
            
            $str .= "</li>".PHP_EOL;
        } 
        
           $str .= "</ul>".PHP_EOL;
    }
    
    
    return $str;
}

echo get_list($isi_komen);
?>
</body>
</html>