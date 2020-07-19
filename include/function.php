<?php

function categories(){
	$con = dbconnect();
	
	$sql = "SELECT * FROM catagory";
	$result = $con->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc()){
        $expression = isset($_SESSION['lang']) && $_SESSION['lang'] == 'th';
		$categories[] = array(
			'id' => $row['id'],
            'category_name' => $expression == true ? $row['title_th'] : $row['title'],
			'subcategory' => sub_categories($row['id']),
		);
	}
	
	return $categories;
}

function sub_categories($id){	
	$con = dbconnect();
	
	$sql = "SELECT * FROM posts WHERE catagory_id = $id";
	$result = $con->query($sql);
	
	$categories = array();
	
	while($row = $result->fetch_assoc()){
        $expression = isset($_SESSION['lang']) && $_SESSION['lang'] == 'th';
		$categories[] = array(
			'id' => $row['id'],
			'parent_id' => $row['catagory_id'],
			'slug' => $row['slug'],
			'category_name' => $expression == true ? $row['title_th'] : $row['title'],
			'subcategory' => sub_categories($row['id']),
		);
	}
	return $categories;
}


function viewsubcat($categories){
	foreach($categories as $category){

		$html .= '<li class="nav-item"><a href="?page=docs&section='.$category['slug'].'"><span class="letter-icon">'.mb_substr($category['category_name'],0,1, "UTF-8").'</span><p>'.$category['category_name'].'</p></a></li></li>';
		
		if( ! empty($category['subcategory'])){
			$html .= viewsubcat($category['subcategory']);
		}
	}
	return $html;
}

// function viewDocumentPage($slug){
// 	$con = dbconnect();

// 	$sql = "SELECT * FROM posts WHERE slug = '.$slug.'";
// 	$result = $con->query($sql);
// 	$rows = mysqli_fetch_assoc($result);
	
// 	return $rows;
// }

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