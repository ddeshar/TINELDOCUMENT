<?php
    if(isset($_GET['page']) && isset($_GET['section'])){
        echo '	<div class="page-inner">
                    <div class="page-header">
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="?page=docs">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">'.breadcrumb($_GET['section'])[0]['catagory'].'</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#">'.breadcrumb($_GET['section'])[0]['post'].'</a>
                            </li>
                        </ul>
                    </div>
                </div>';
    }else{
        echo '<div class="card-header bg-info-gradient text-white bubble-shadow">
            <h4>'._introduction.'</h4>
            <p class="mb-0 op-7">'._slogan.'</p>
        </div>';
    }