<?php

function breadcrumb($slug){
	$con = dbconnect();
    $sql="SELECT
                    C.title_th AS catTitleTh,
                    C.title AS catTitleEn,
                    P.title AS postTitleEn,
                    P.title_th AS postTitleTh
                FROM
                    posts AS P
                INNER JOIN catagory AS C ON P.catagory_id = C.id
				Where p.slug = '".$slug."'";

	$result = $con->query($sql);
	$categories = [];
	while($row = $result->fetch_assoc()){
        $expression = isset($_SESSION['lang']) && $_SESSION['lang'] == 'th';
		$categories[] =[
			'catagory' => $expression == true ? $row['catTitleTh'] : $row['catTitleEn'],
			'post' => $expression == true ? $row['postTitleTh'] : $row['postTitleEn'],
		];
	}

    // $row=mysqli_fetch_array($sql);
    // $userinfo=$row[0];
    return $categories;
}