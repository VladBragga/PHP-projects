<?php 	
include "connect.php";
///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////               Акустича гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
if($_POST['filt_c1']){
            $filt_c1= json_decode($_POST['filt_c1']);
               
                 if ($filt_c1=='nachalo') {
                    $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and target LIKE '%Для початковців%'");
                } elseif ($filt_c1=='prakt') {
                    $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and target LIKE '%Для практикуючих%'");
                } elseif ($filt_c1=='concert') {
                    $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and target LIKE '%Для концертів%'");
                }
                if(!$table)
                {
                    echo 'Ошибка!';
                }
                foreach($table as $row)
                        printf('
                        
                        <!-- Single Product Start -->
                                                    
                        <div class="col-sm-4 fix">
                        <div class="product-item fix">
                    
                                <div class="product-img-hover">
                        <!-- Product image -->
            
                    <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                        <!-- Product action Btn -->
                        
                        </div>
                    
                        <!-- Product Name -->
                        <div class="pro-name">
                            <a href="/combik_details.php?id=%s">%s</a>
                            
                                <p><span class="old">%s</span></p>
                        
                        </div>
                        <!-- Product Price -->
                        </div>
        </div><!-- Single Product End -->
             ', $row['c_id'], $row['c_photo'], $row['c_id'], $row['c_name'], $row['c_country']);
                     ;
                  exit();
            }
//////////////////////////////////////////////////////////////////////////////////////////
////////
            if($_POST['filt_c2']){
                $filttypes_2= json_decode($_POST['filt_c2']);
                // echo $filttype; exit();
                       
                        if ($filttypes_2=='ya') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%YAMAHA%'");
                    } 
                    elseif ($filttypes_2=='mar') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%Marshall%'");
                    } 
                     elseif ($filttypes_2=='ibanez') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%IBANEZ%'");
                    } elseif ($filttypes_2=='fen') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%Fender%'");
                    }
                    elseif ($filttypes_2=='cor') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%Cort%'");
                    }
                    elseif ($filttypes_2=='lan') {
                        $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and c_firm LIKE '%Laney%'");
                    }
                    
                if(!$tables)
                    {
                        echo 'В каталозі не має таких гітар!';
                    }
                    foreach($tables as $rows)
                            printf('
                            <!-- Single Product Start -->
                                                    
                            <div class="col-sm-4 fix">
                            <div class="product-item fix">
                        
                                    <div class="product-img-hover">
                            <!-- Product image -->
                
                        <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                            <!-- Product action Btn -->
                            
                            </div>
                        
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="/combik_details.php?id=%s">%s</a>
                                
                                    <p><span class="old">%s</span></p>
                            
                            </div>
                            <!-- Product Price -->
                            </div>
            </div><!-- Single Product End -->

                         ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                         ;
                      exit();
                } 

//////////////////////////////
                if($_POST['filt_c21']){
                    $filt_c21= json_decode($_POST['filt_c21']);
                    if($filt_c21=='all_s')  {
                        $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2");
                    }
                    elseif ($filt_c21=='lamp') {
                            $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and type_id=2");
                    } elseif ($filt_c21=='trans') {
                            $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=2 and type_id=1");
                        } 
                        if(!$tables1)
                        {
                            echo 'В каталозі не має таких гітар!';
                        }
                        foreach($tables1 as $rows)
                                printf('
                         <!-- Single Product Start -->
                                                        
                                <div class="col-sm-4 fix">
                                <div class="product-item fix">
                            
                                        <div class="product-img-hover">
                                <!-- Product image -->
                    
                            <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                <!-- Product action Btn -->
                                
                                </div>
                            
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="/combik_details.php?id=%s">%s</a>
                                    
                                        <p><span class="old">%s</span></p>
                                
                                </div>
                                <!-- Product Price -->
                                </div>
                </div><!-- Single Product End -->
    
                             ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                             ;
                          exit();
                    } 


///////////////////////////////////////////                                      //////////////////////////                                
//////////////////////////////////////////                 Електрогітара              /////////////////////////
////////////////////////////////////////////                                        ////////////////////////        
////////////////////////////////////////////                                        ////////////////////////
if($_POST['filt3']){
    $filt= json_decode($_POST['filt3']);
    
       
         if ($filt=='nachalo') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and target LIKE '%Для початковців%'");
        } elseif ($filt=='prakt') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and target LIKE '%Для практикуючих%'");
        } elseif ($filt=='concert') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and target LIKE '%Для концертів%'");
        }
        if(!$table)
        {
            echo 'Ошибка!';
        }
        foreach($table as $row)
                printf('
                
                <!-- Single Product Start -->
                                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/combik_details.php?id=%s">%s</a>
                    
                        <p><span class="old">%s</span></p>
                
                </div>
                <!-- Product Price -->
                </div>
</div><!-- Single Product End -->
     ', $row['c_id'], $row['c_photo'], $row['c_id'], $row['c_name'], $row['c_country']);
             ;
          exit();
    }
//////////////////////////////////////////////////////////////////////////////////////////
////////
    if($_POST['filt_c4']){
        $filttypes_4= json_decode($_POST['filt_c4']);
         //echo $filttypes_4; exit();
               
                if ($filttypes_4=='ya') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%YAMAHA%'");
            } 
            elseif ($filttypes_4=='mar') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%Marshall%'");
            } 
             elseif ($filttypes_4=='ibanez') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%IBANEZ%'");
            } elseif ($filttypes_4=='fen') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%Fender%'");
            }
            elseif ($filttypes_4=='cor') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%Cort%'");
            }
            elseif ($filttypes_4=='lan') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and c_firm LIKE '%Laney%'");
            }
            
        if(!$tables)
            {
                echo 'В каталозі не має таких гітар!';
            }
            foreach($tables as $rows)
                    printf('
                    <!-- Single Product Start -->
                                                        
                    <div class="col-sm-4 fix">
                    <div class="product-item fix">
                
                            <div class="product-img-hover">
                    <!-- Product image -->
        
                <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                    <!-- Product action Btn -->
                    
                    </div>
                
                    <!-- Product Name -->
                    <div class="pro-name">
                        <a href="/combik_details.php?id=%s">%s</a>
                        
                            <p><span class="old">%s</span></p>
                    
                    </div>
                    <!-- Product Price -->
                    </div>
    </div><!-- Single Product End -->

                 ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                 ;
              exit();
        } 

//////////////////////////////
        if($_POST['filt_c41']){

            $filt_c= json_decode($_POST['filt_c41']);
               
            if($filt_c=='all_s')  {
                $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3");
            }
            elseif ($filt_c=='lamp') {
                    $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and type_id=2");

            } elseif ($filt_c=='trans') {
                    $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=3 and type_id=1");
                } 
                if(!$tables1)
                {
                    echo 'В каталозі не має таких гітар!';
                }
                foreach($tables1 as $rows)
                        printf('
                        <!-- Single Product Start -->
                                                        
                        <div class="col-sm-4 fix">
                        <div class="product-item fix">
                    
                                <div class="product-img-hover">
                        <!-- Product image -->
            
                    <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                        <!-- Product action Btn -->
                        
                        </div>
                    
                        <!-- Product Name -->
                        <div class="pro-name">
                            <a href="/combik_details.php?id=%s">%s</a>
                            
                                <p><span class="old">%s</span></p>
                        
                        </div>
                        <!-- Product Price -->
                        </div>
        </div><!-- Single Product End -->

                     ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                     ;
                  exit();
            } 

///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Бас Гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////

if($_POST['filt_c5']){
    $filt_c1= json_decode($_POST['filt_c5']);
   
       
         if ($filt_c1=='nachalo') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and target LIKE '%Для початковців%'");
        } elseif ($filt_c1=='prakt') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and target LIKE '%Для практикуючих%'");
        } elseif ($filt_c1=='concert') {
            $table = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and target LIKE '%Для концертів%'");
        }
        if(!$table)
        {
            echo 'Ошибка!';
        }
        foreach($table as $row)
                printf('
                
                <!-- Single Product Start -->
                                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/combik_details.php?id=%s">%s</a>
                    
                        <p><span class="old">%s</span></p>
                
                </div>
                <!-- Product Price -->
                </div>
</div><!-- Single Product End -->
     ', $row['c_id'], $row['c_photo'], $row['c_id'], $row['c_name'], $row['c_country']);
             ;
          exit();
    }
//////////////////////////////////////////////////////////////////////////////////////////
////////
    if($_POST['filt_c6']){
        $filttypes_2= json_decode($_POST['filt_c6']);
        // echo $filttype; exit();
               
                if ($filttypes_2=='ya') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%YAMAHA%'");
            } 
            elseif ($filttypes_2=='mar') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%Marshall%'");
            } 
             elseif ($filttypes_2=='ibanez') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%IBANEZ%'");
            } elseif ($filttypes_2=='fen') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%Fender%'");
            }
            elseif ($filttypes_2=='cor') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%Cort%'");
            }
            elseif ($filttypes_2=='lan') {
                $tables = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and c_firm LIKE '%Laney%'");
            }
            
        if(!$tables)
            {
                echo 'В каталозі не має таких гітар!';
            }
            foreach($tables as $rows)
                    printf('
                    <!-- Single Product Start -->
                                                        
                    <div class="col-sm-4 fix">
                    <div class="product-item fix">
                
                            <div class="product-img-hover">
                    <!-- Product image -->
        
                <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                    <!-- Product action Btn -->
                    
                    </div>
                
                    <!-- Product Name -->
                    <div class="pro-name">
                        <a href="/combik_details.php?id=%s">%s</a>
                        
                            <p><span class="old">%s</span></p>
                    
                    </div>
                    <!-- Product Price -->
                    </div>
    </div><!-- Single Product End -->
                 ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                 ;
              exit();
        } 

//////////////////////////////
        if($_POST['filt_c61']){
            $filt_c21= json_decode($_POST['filt_c61']);
            if($filt_c21=='all_s')  {
                $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4");
            }
            elseif ($filt_c21=='lamp') {
                    $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and type_id=2");
            } elseif ($filt_c21=='trans') {
                    $tables1 = mysqli_query($link, "SELECT * FROM `combo` WHERE id_vid=4 and type_id=1");
                } 
                if(!$tables1)
                {
                    echo 'В каталозі не має таких гітар!';
                }
                foreach($tables1 as $rows)
                        printf('
                        <!-- Single Product Start -->
                                                        
                        <div class="col-sm-4 fix">
                        <div class="product-item fix">
                    
                                <div class="product-img-hover">
                        <!-- Product image -->
            
                    <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                        <!-- Product action Btn -->
                        
                        </div>
                    
                        <!-- Product Name -->
                        <div class="pro-name">
                            <a href="/combik_details.php?id=%s">%s</a>
                            
                                <p><span class="old">%s</span></p>
                        
                        </div>
                        <!-- Product Price -->
                        </div>
        </div><!-- Single Product End -->
                     ', $rows['c_id'], $rows['c_photo'], $rows['c_id'], $rows['c_name'], $rows['c_country']);
                     ;
                  exit();
            } 
//////////////////////////////////////////
//////////////////PEDAL///////////////////
/////////////////////////////////////////


if($_POST['filt_p']){
    $filttypes_2= json_decode($_POST['filt_p']);
    // echo $filttype; exit();
  
            if ($filttypes_2=='acus') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE id_vid=2");
        } 
        elseif ($filttypes_2=='elec') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE id_vid=3");
        } 
         elseif ($filttypes_2=='bass') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE id_vid=4");
         }
    if(!$tables)
        {
            echo 'В каталозі не має таких гітар!';
        }
        foreach($tables as $rows)
                printf('
                <!-- Single Product Start -->
                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/pedal_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/pedal_details.php?id=%s">%s</a>
                    
                        <p><span class="old">%s</span></p>
                
                </div>
                <!-- Product Price -->
                </div>
</div><!-- Single Product End -->

             ', $rows['p_id'], $rows['p_photo'], $rows['p_id'], $rows['p_name'], $rows['p_country']);
             ;
          exit();
    } 
//////////////////////////////////////////////////
if($_POST['filt_p1']){
    $filttypes_2= json_decode($_POST['filt_p1']);

 
            if ($filttypes_2=='boss') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE p_firm LIKE '%BOSS%'");
        }  
        elseif ($filttypes_2=='zoom') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE p_firm LIKE '%ZOOM%'");
        } 
         elseif ($filttypes_2=='dun') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE p_firm LIKE '%Dunlop%'");
         }
         elseif ($filttypes_2=='mooer') {
            $tables = mysqli_query($link, "SELECT * FROM `pedal` WHERE p_firm LIKE '%MOOER%'");
         }
    if(!$tables)
        {
            echo 'В каталозі не має таких гітар!';
        }
        foreach($tables as $rows)
                printf('
                <!-- Single Product Start -->
                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/pedal_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/pedal_details.php?id=%s">%s</a>
                    
                        <p><span class="old">%s</span></p>
                
                </div>
                <!-- Product Price -->
                </div>
</div><!-- Single Product End -->

             ', $rows['p_id'], $rows['p_photo'], $rows['p_id'], $rows['p_name'], $rows['p_country']);
             ;
          exit();
    } 

//////////////////////////////////////////
///////////////SORTIROVKA//////////////////
//////////////////////////////////////////
///////////////////////////////////////////
///////////////////////////////////////////
if ($_POST['sort_4']) {
    $sort=json_decode($_POST['sort_4']);
     // echo $sort; exit();
    if ($sort=="name") {
        $column="c_name";
        $order = 'asc';}
        elseif ($sort=="name_2") {
            $column="c_name";  
            $order = 'desc';
        }
        elseif ($sort=="original-order") {
            $select = sprintf('SELECT `c_id` AS id,
            `c_photo` AS image , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=2');
        } 
        if (!$select) {
            $select = sprintf('SELECT DISTINCT `c_id` AS id,
        `c_photo` AS "image" , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=2 ORDER BY %s %s LIMIT 12', $column, $order);
        } 
    
        $combo1 = mysqli_query($link, $select);
        foreach ($combo1 as $com) {
            printf('
            <!-- Single Product Start -->
                                                        
            <div class="col-sm-4 fix">
            <div class="product-item fix">
        
                    <div class="product-img-hover">
            <!-- Product image -->

        <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
            <!-- Product action Btn -->
            
            </div>
        
            <!-- Product Name -->
            <div class="pro-name">
                <a href="/combik_details.php?id=%s">%s</a>
                
                    <p><span class="old">%s</span></p>
            
            </div>
            <!-- Product Price -->
            </div>
</div><!-- Single Product End -->

         ', $com['id'], $com['image'], $com['id'], $com['name'], $com['country']);
         ;
        }
        exit();
    }
    //////////////////////////////////////
    ////////////////////////////////////////
    if ($_POST['sort_5']) {
        $sort=json_decode($_POST['sort_5']);
        if ($sort=="name") {
            $column='c_name';
            $order = 'asc';}
            elseif ($sort=="name_2") {
                $column='c_name';  
                $order = "desc";
            }
         elseif ($sort=="original-order") {
            $select = sprintf('SELECT `c_id` AS id,
                `c_photo` AS image , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=3');
        } 
        if (!$select) {
            $select = sprintf('SELECT DISTINCT `c_id` AS id,
        `c_photo` AS "image" , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=3 ORDER BY %s %s LIMIT 12', $column, $order);
        } 
         
            $tovar = mysqli_query($link, $select);
            foreach ($tovar as $tov) {
                printf('
                <!-- Single Product Start -->
                                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/combik_details.php?id=%s">%s</a>
                    
                        <p><span class="old">%s</span></p>
                
                </div>
                <!-- Product Price -->
                </div>
</div><!-- Single Product End -->
             ', $tov['id'], $tov['image'], $tov['id'], $tov['name'], $tov['country']);
             ;
            }
            exit();
        }
        ///////////////
        ////////////////
        if ($_POST['sort_6']) {
            $sort=json_decode($_POST['sort_6']);
            if ($sort=="name") {
                $column="c_name";
                $order = 'asc';}
                elseif ($sort=="name_2") {
                    $column="c_name";  
                    $order = "desc";
                }
             elseif ($sort=="original-order") {
                $select = sprintf('SELECT `c_id` AS id,
                `c_photo` AS image , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=4');
            } 
            if (!$select) {
                $select = sprintf('SELECT DISTINCT `c_id` AS id,
            `c_photo` AS "image" , `c_name` AS  name, `c_country` AS country FROM `combo` WHERE id_vid=4 ORDER BY %s %s LIMIT 12', $column, $order);
            } 
             
                $tovar = mysqli_query($link, $select);
                foreach ($tovar as $tov) {
                    printf('
                    <!-- Single Product Start -->
                                                        
                    <div class="col-sm-4 fix">
                    <div class="product-item fix">
                
                            <div class="product-img-hover">
                    <!-- Product image -->
        
                <a class="pro-image fix" href="/combik_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                    <!-- Product action Btn -->
                    
                    </div>
                
                    <!-- Product Name -->
                    <div class="pro-name">
                        <a href="/combik_details.php?id=%s">%s</a>
                        
                            <p><span class="old">%s</span></p>
                    
                    </div>
                    <!-- Product Price -->
                    </div>
    </div><!-- Single Product End -->
                 ', $tov['id'], $tov['image'], $tov['id'], $tov['name'], $tov['country']);
                 ;
                }
                exit();
            }
            //////////////////////////////////
            ///////////////////PEDAl//////////
            ///////////////////////////////////
            if ($_POST['sort_7']) {
                $sort=json_decode($_POST['sort_7']);
                if ($sort=="name") {
                    $column='p_name';
                    $order = 'asc';}
                    elseif ($sort=="name_2") {
                        $column='p_name';  
                        $order = "desc";
                    }
                 elseif ($sort=="original-order") {
                    $select = sprintf('SELECT `p_id` AS id,
                    `p_photo` AS image , `p_name` AS  name, `p_country` AS country FROM `pedal`');
                } 
                if (!$select) {
                    $select = sprintf('SELECT `p_id` AS id,
                    `p_photo` AS image , `p_name` AS  name, `p_country` AS country FROM `pedal` ORDER BY %s %s LIMIT 12', $column, $order);
                } 
                 
                    $tovar = mysqli_query($link, $select);
                    foreach ($tovar as $tov) {
                        printf('
                        <!-- Single Product Start -->
                                                                
                        <div class="col-sm-4 fix">
                        <div class="product-item fix">
                    
                                <div class="product-img-hover">
                        <!-- Product image -->
            
                    <a class="pro-image fix" href="/pedal_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                        <!-- Product action Btn -->
                        
                        </div>
                    
                        <!-- Product Name -->
                        <div class="pro-name">
                            <a href="/pedal_details.php?id=%s">%s</a>
                            
                                <p><span class="old">%s</span></p>
                        
                        </div>
                        <!-- Product Price -->
                        </div>
            </div><!-- Single Product End -->
                     ', $tov['id'], $tov['image'], $tov['id'], $tov['name'], $tov['country']);
                     ;
                    }
                    exit();
                }