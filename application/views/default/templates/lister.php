<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

<body> 
    <?php
    foreach($listing as $list){
        
        if($list['parent_id_comment'] > 0){
            echo "anak";
        }else{
            echo $list['name']. 'Said : '. $list['comment']. "<br>";
        }
    }
    ?>
</body>
</html>