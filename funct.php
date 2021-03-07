<?php 	
include "connect.php";
///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////               Акустича гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
if($_POST['filttype_2']){
            $filttype_2= json_decode($_POST['filttype_2']);
            // echo $filttype; exit();
               
                 if ($filttype_2=='nachalo') {
                    $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and target LIKE '%Для початковців%'");
                } elseif ($filttype_2=='prakt') {
                    $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and target LIKE '%Для практикуючих%'");
                } elseif ($filttype_2=='concert') {
                    $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and target LIKE '%Для концертів%'");
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
            
                    <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                        <!-- Product action Btn -->
                        
                        </div>
                    
                        <!-- Product Name -->
                        <div class="pro-name">
                            <a href="/guitar_details.php?id=%s">%s</a>
                            
                                <p><span class="old">%s</span></p>
                        
                        </div>
                        <!-- Product Price -->
                        </div>
        </div><!-- Single Product End -->
             ', $row['g_id'], $row['g_photo'], $row['g_id'], $row['g_name'], $row['g_country']);
                     ;
                  exit();
            }

            if($_POST['filttypes_2']){
                $filttypes_2= json_decode($_POST['filttypes_2']);
                // echo $filttype; exit();
                       
                        if ($filttypes_2=='ya') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%YAMAHA%'");
                    } elseif ($filttypes_2=='mar') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%The Martin Guitar Company%'");
                    } elseif ($filttypes_2=='gib') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%Gibson%'");
                    } 
                     elseif ($filttypes_2=='ibanez') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%IBANEZ%'");
                    } elseif ($filttypes_2=='fen') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%Fender%'");
                    }
                    elseif ($filttypes_2=='cor') {
                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_name_firm LIKE '%Cort%'");
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
                
                        <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                            <!-- Product action Btn -->
                            
                            </div>
                        
                            <!-- Product Name -->
                            <div class="pro-name">
                                <a href="/guitar_details.php?id=%s">%s</a>
                                
                                    <p><span class="old">%s</span></p>
                            
                            </div>
                            <!-- Product Price -->
                            </div>
            </div><!-- Single Product End -->
                         ', $rows['g_id'], $rows['g_photo'], $rows['g_id'], $rows['g_name'], $rows['g_country']);
                         ;
                      exit();
                } 

//////////////////////////////
                if($_POST['filttypes_2_1']){
                    $filttypes_2_1= json_decode($_POST['filttypes_2_1']);
                    // echo $filttype; exit();
                           
                            if ($filttypes_2_1=='6_s') {
                            $tables1 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_kol_s=6");
                        } elseif ($filttypes_2_1=='12_s') {
                            $tables1 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2 and g_kol_s=12");
                        } elseif($filttypes_2_1=='all_s') {
                            $tables1 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=2");
                        }
                        if(!$tables1)
                        {
                            echo 'В каталозі не має таких гітар!';
                        }
                        foreach($tables1 as $rows1)
                                printf('
                                <!-- Single Product Start -->
                                                    
                                <div class="col-sm-4 fix">
                                <div class="product-item fix">
                            
                                        <div class="product-img-hover">
                                <!-- Product image -->
                    
                            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                <!-- Product action Btn -->
                                
                                </div>
                            
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="/guitar_details.php?id=%s">%s</a>
                                    
                                        <p><span class="old">%s</span></p>
                                
                                </div>
                                <!-- Product Price -->
                                </div>
                </div><!-- Single Product End -->
                             ', $rows1['g_id'], $rows1['g_photo'], $rows1['g_id'], $rows1['g_name'], $rows1['g_country']);
                             ;
                          exit();
                    } 


///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Класична гітара              /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
                if($_POST['filttype_1']){
                    $filttype_1= json_decode($_POST['filttype_1']);
                    // echo $filttype; exit();
                        if($filttype_1=='child_3'){
                            $table =  mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and target LIKE '%Для дітей%'");
                        } 
                         elseif ($filttype_1=='nachalo_3') {
                            $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and target LIKE '%Для початковців%'");
                        } elseif ($filttype_1=='prakt_3') {
                            $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and target LIKE '%Для практикуючих%'");
                        } elseif ($filttype_1=='concert_3') {
                            $table = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and target LIKE '%Для концертів%'");
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
                    
                            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                <!-- Product action Btn -->
                                
                                </div>
                            
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="/guitar_details.php?id=%s">%s</a>
                                    
                                        <p><span class="old">%s</span></p>
                                
                                </div>
                                <!-- Product Price -->
                                </div>
                </div><!-- Single Product End -->
                             ', $row['g_id'], $row['g_photo'], $row['g_id'], $row['g_name'], $row['g_country']);
                             ;
                          exit();
                    }
        
                    if($_POST['filttypes_1']){
                        $filttypes_1= json_decode($_POST['filttypes_1']);
                        // echo $filttype; exit();
                               
                                if ($filttypes_1=='ya') {
                                $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and g_name_firm LIKE '%YAMAHA%'");
                            } 
                             elseif ($filttypes_1=='ibanez') {
                                $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and g_name_firm LIKE '%IBANEZ%'");
                            } elseif ($filttypes_1=='el') {
                                $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and g_name_firm LIKE '%Enrique Keller S.A.%'");
                            }
                            elseif ($filttypes_1=='cor') {
                                $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and g_name_firm LIKE '%Cort%'");
                            }
                            elseif ($filttypes_1=='fen') {
                                $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=1 and g_name_firm LIKE '%Fender%'");
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
                        
                                <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                    <!-- Product action Btn -->
                                    
                                    </div>
                                
                                    <!-- Product Name -->
                                    <div class="pro-name">
                                        <a href="/guitar_details.php?id=%s">%s</a>
                                        
                                            <p><span class="old">%s</span></p>
                                    
                                    </div>
                                    <!-- Product Price -->
                                    </div>
                    </div><!-- Single Product End -->
                                 ', $rows['g_id'], $rows['g_photo'], $rows['g_id'], $rows['g_name'], $rows['g_country']);
                                 ;
                              exit();
                        }

///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Електрогітара              /////////////////////////
////////////////////////////////////////////                                        ////////////////////////
                        if($_POST['filttype_3']){
                            $filttype_3= json_decode($_POST['filttype_3']);
                            // echo $filttype; exit();
                                if($filttype_3=='child'){
                                    $table_3 =  mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and target LIKE '%Для дітей%'");
                                } 
                                 elseif ($filttype_3=='nachalo') {
                                    $table_3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and target LIKE '%Для початковців%'");
                                } elseif ($filttype_3=='prakt') {
                                    $table_3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and target LIKE '%Для практикуючих%'");
                                } elseif ($filttype_3=='concert') {
                                    $table_3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and target LIKE '%Для концертів%'");
                                }
                                if(!$table_3)
                                {
                                    echo 'Ошибка!';
                                }
                                foreach($table_3 as $row_3)
                                        printf('
                                        <!-- Single Product Start -->
                                                            
                                        <div class="col-sm-4 fix">
                                        <div class="product-item fix">
                                    
                                                <div class="product-img-hover">
                                        <!-- Product image -->
                            
                                    <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                        <!-- Product action Btn -->
                                        
                                        </div>
                                    
                                        <!-- Product Name -->
                                        <div class="pro-name">
                                            <a href="/guitar_details.php?id=%s">%s</a>
                                            
                                                <p><span class="old">%s</span></p>
                                        
                                        </div>
                                        <!-- Product Price -->
                                        </div>
                        </div><!-- Single Product End -->
                                     ', $row_3['g_id'], $row_3['g_photo'], $row_3['g_id'], $row_3['g_name'], $row_3['g_country']);
                                     ;
                                  exit();
                            }
                
                            if($_POST['filttypes_3']){
                                $filttypes_3= json_decode($_POST['filttypes_3']);
                                // echo $filttype; exit();
                                       
                                        if ($filttypes_3=='ya') {
                                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_name_firm LIKE '%YAMAHA%'");
                                    }  elseif ($filttypes_3=='cor') {
                                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_name_firm LIKE '%Cort%'");
                                    } elseif ($filttypes_3=='gib') {
                                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_name_firm LIKE '%Gibson%'");
                                    } 
                                     elseif ($filttypes_3=='ibanez') {
                                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_name_firm LIKE '%IBANEZ%'");
                                    } 
                                    elseif ($filttypes_3=='fen') {
                                        $tables = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_name_firm LIKE '%Fender%'");
                                    }
                                    
                                    if(!$tables)
                                    {
                                        echo 'В каталозі не має таких гітар!';
                                    }
                                    foreach($tables as $row)
                                            printf('
                                            <!-- Single Product Start -->
                                                                
                                            <div class="col-sm-4 fix">
                                            <div class="product-item fix">
                                        
                                                    <div class="product-img-hover">
                                            <!-- Product image -->
                                
                                        <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                            <!-- Product action Btn -->
                                            
                                            </div>
                                        
                                            <!-- Product Name -->
                                            <div class="pro-name">
                                                <a href="/guitar_details.php?id=%s">%s</a>
                                                
                                                    <p><span class="old">%s</span></p>
                                            
                                            </div>
                                            <!-- Product Price -->
                                            </div>
                            </div><!-- Single Product End -->
                                         ', $row['g_id'], $row['g_photo'], $row['g_id'], $row['g_name'], $row['g_country']);
                                         ;
                                      exit();
                                }



                                if($_POST['filttypes_3_1']){
                                    $filttypes_3_1= json_decode($_POST['filttypes_3_1']);
                                    // echo $filttype; exit();
                                           
                                            if ($filttypes_3_1=='6_s') {
                                            $tables3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_kol_s=6");
                                        } elseif ($filttypes_3_1=='7_s') {
                                            $tables3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3 and g_kol_s=7");
                                        } elseif ($filttypes_3_1=='all_s') {
                                            $tables3 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=3");
                                        } 
                                        if(!$tables3)
                                        {
                                            echo 'В каталозі не має таких гітар!';
                                        }
                                        foreach($tables3 as $rows3)
                                                printf('
                                                <!-- Single Product Start -->
                                                                    
                                                <div class="col-sm-4 fix">
                                                <div class="product-item fix">
                                            
                                                        <div class="product-img-hover">
                                                <!-- Product image -->
                                    
                                            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                                <!-- Product action Btn -->
                                                
                                                </div>
                                            
                                                <!-- Product Name -->
                                                <div class="pro-name">
                                                    <a href="/guitar_details.php?id=%s">%s</a>
                                                    
                                                        <p><span class="old">%s</span></p>
                                                
                                                </div>
                                                <!-- Product Price -->
                                                </div>
                                </div><!-- Single Product End -->
                                             ', $rows3['g_id'], $rows3['g_photo'], $rows3['g_id'], $rows3['g_name'], $rows3['g_country']);
                                             ;
                                          exit();
                                    } 
                
///////////////////////////////////////////                                      //////////////////////////
//////////////////////////////////////////                 Бас Гітара             /////////////////////////
////////////////////////////////////////////                                        ////////////////////////

                                if($_POST['filttype_4']){
                                    $filttype_4= json_decode($_POST['filttype_4']);
                                        if ($filttype_4=='nachalo_4') {
                                            $table_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and target LIKE '%Для початковців%'");
                                        } elseif ($filttype_4=='prakt_4') {
                                            $table_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and target LIKE '%Для практикуючих%'");
                                        } elseif ($filttype_4=='concert_4') {
                                            $table_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and target LIKE '%Для концертів%'");
                                        }
                                        if(!$table_4)
                                        {
                                            echo 'Ошибка!';
                                        }
                                        foreach($table_4 as $row_4)
                                                printf('
                                                <!-- Single Product Start -->
                                                                    
                                                <div class="col-sm-4 fix">
                                                <div class="product-item fix">
                                            
                                                        <div class="product-img-hover">
                                                <!-- Product image -->
                                    
                                            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                                <!-- Product action Btn -->
                                                
                                                </div>
                                            
                                                <!-- Product Name -->
                                                <div class="pro-name">
                                                    <a href="/guitar_details.php?id=%s">%s</a>
                                                    
                                                        <p><span class="old">%s</span></p>
                                                
                                                </div>
                                                <!-- Product Price -->
                                                </div>
                                </div><!-- Single Product End -->
                                             ', $row_4['g_id'], $row_4['g_photo'], $row_4['g_id'], $row_4['g_name'], $row_4['g_country']);
                                             ;
                                          exit();
                                    }
                        
                                    if($_POST['filttypes_4']){
                                        $filttypes_4= json_decode($_POST['filttypes_4']);
                                        // echo $filttype; exit();
                                               
                                                if ($filttypes_4=='ya_4') {
                                                $tables_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_name_firm LIKE '%YAMAHA%'");
                                            } elseif ($filttypes_4=='gib_4') {
                                                $tables_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_name_firm LIKE '%Gibson%'");
                                            } 
                                             elseif ($filttypes_4=='ibanez_4') {
                                                $tables_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_name_firm LIKE '%IBANEZ%'");
                                            } 
                                             elseif ($filttypes_4=='fen_4') {
                                                $tables_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_name_firm LIKE '%Fender%'");
                                             } elseif ($filttypes_4=='es_4') {
                                                $tables_4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_name_firm LIKE '%ESP%'");
                                            }
                                            if(!$tables_4)
                                            {
                                                echo 'В каталозі не має таких гітар!';
                                            }
                                            foreach($tables_4 as $rows_4)
                                                    printf('
                                                    <!-- Single Product Start -->
                                                                        
                                                    <div class="col-sm-4 fix">
                                                    <div class="product-item fix">
                                                
                                                            <div class="product-img-hover">
                                                    <!-- Product image -->
                                        
                                                <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                                    <!-- Product action Btn -->
                                                    
                                                    </div>
                                                
                                                    <!-- Product Name -->
                                                    <div class="pro-name">
                                                        <a href="/guitar_details.php?id=%s">%s</a>
                                                        
                                                            <p><span class="old">%s</span></p>
                                                    
                                                    </div>
                                                    <!-- Product Price -->
                                                    </div>
                                    </div><!-- Single Product End -->
                                                 ', $rows_4['g_id'], $rows_4['g_photo'], $rows_4['g_id'], $rows_4['g_name'], $rows_4['g_country']);
                                                 ;
                                              exit();
                                        }


                                        
                if($_POST['filttypes_4_1']){
                    $filttypes_4_1= json_decode($_POST['filttypes_4_1']);
                    // echo $filttype; exit();
                           
                            if ($filttypes_4_1=='4_s') {
                            $tables4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_kol_s=4");
                        } elseif ($filttypes_4_1=='5_s') {
                            $tables4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4 and g_kol_s=5");
                        } elseif ($filttypes_4_1=='all_s') {
                            $tables4 = mysqli_query($link, "SELECT * FROM `guitar` WHERE id_vid=4");
                        } 
                        if(!$tables4)
                        {
                            echo 'В каталозі не має таких гітар!';
                        }
                        foreach($tables4 as $rows4)
                                printf('
                                <!-- Single Product Start -->
                                                    
                                <div class="col-sm-4 fix">
                                <div class="product-item fix">
                            
                                        <div class="product-img-hover">
                                <!-- Product image -->
                    
                            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                                <!-- Product action Btn -->
                                
                                </div>
                            
                                <!-- Product Name -->
                                <div class="pro-name">
                                    <a href="/guitar_details.php?id=%s">%s</a>
                                    
                                        <p><span class="old">%s</span></p>
                                
                                </div>
                                <!-- Product Price -->
                                </div>
                </div><!-- Single Product End -->
                             ', $rows4['g_id'], $rows4['g_photo'], $rows4['g_id'], $rows4['g_name'], $rows4['g_country']);
                             ;
                          exit();
                    } 

        
//////////////////////////////////
////////////////////////////////
//////////////SORTIRIVKA///////////
////////////////////////////////
/////////////////////////////////

if ($_POST['sort']) {
    $sort=json_decode($_POST['sort']);
    if ($sort=="name") {
        $column="g_name";
        $order = 'asc';}
        elseif ($sort=="name_2") {
            $column="g_name";  
            $order = "desc";
        }
     elseif ($sort=="original-order") {
        $select = sprintf('SELECT `g_id` AS id,
        `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=2');
    } 
    if (!$select) {
        $select = sprintf('SELECT DISTINCT `g_id` AS id,
    `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=2 ORDER BY %s %s LIMIT 12', $column, $order);
    } 
     
        $tovar = mysqli_query($link, $select);
        foreach ($tovar as $tov) {
            printf('
            <!-- Single Product Start -->
                                                    
            <div class="col-sm-4 fix">
            <div class="product-item fix">
        
                    <div class="product-img-hover">
            <!-- Product image -->

        <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
            <!-- Product action Btn -->
            
            </div>
        
            <!-- Product Name -->
            <div class="pro-name">
                <a href="/guitar_details.php?id=%s">%s</a>
                
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
    
////////////////////////////////////////////////////////////////////////////

    if ($_POST['sort_1']) {
        $sort=json_decode($_POST['sort_1']);
        if ($sort=="name") {
            $column="g_name";
            $order = 'asc';}
            elseif ($sort=="name_2") {
                $column="g_name";  
                $order = "desc";
            }
         elseif ($sort=="original-order") {
            $select = sprintf('SELECT `g_id` AS id,
            `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=3');
        } 
        if (!$select) {
            $select = sprintf('SELECT DISTINCT `g_id` AS id,
        `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=3 ORDER BY %s %s LIMIT 12', $column, $order);
        } 
         
            $tovar = mysqli_query($link, $select);
            foreach ($tovar as $tov) {
                printf('
                <!-- Single Product Start -->
                                                        
                <div class="col-sm-4 fix">
                <div class="product-item fix">
            
                        <div class="product-img-hover">
                <!-- Product image -->
    
            <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                <!-- Product action Btn -->
                
                </div>
            
                <!-- Product Name -->
                <div class="pro-name">
                    <a href="/guitar_details.php?id=%s">%s</a>
                    
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
////////////////////////////////////////////////////////////////////////////////////////////

        if ($_POST['sort_2']) {
            $sort=json_decode($_POST['sort_2']);
            if ($sort=="name") {
                $column="g_name";
                $order = 'asc';}
                elseif ($sort=="name_2") {
                    $column="g_name";  
                    $order = "desc";
                }
             elseif ($sort=="original-order") {
                $select = sprintf('SELECT `g_id` AS id,
                `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=1');
            } 
            if (!$select) {
                $select = sprintf('SELECT DISTINCT `g_id` AS id,
            `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=1 ORDER BY %s %s LIMIT 12', $column, $order);
            } 
             
                $tovar = mysqli_query($link, $select);
                foreach ($tovar as $tov) {
                    printf('
                    <!-- Single Product Start -->
                                                            
                    <div class="col-sm-4 fix">
                    <div class="product-item fix">
                
                            <div class="product-img-hover">
                    <!-- Product image -->
        
                <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
                    <!-- Product action Btn -->
                    
                    </div>
                
                    <!-- Product Name -->
                    <div class="pro-name">
                        <a href="/guitar_details.php?id=%s">%s</a>
                        
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
////////////////////////////////////////////////////////////////////////////////////////////////

if ($_POST['sort_3']) {
    $sort=json_decode($_POST['sort_3']);
    if ($sort=="name") {
        $column="g_name";
        $order = 'asc';}
        elseif ($sort=="name_2") {
            $column="g_name";  
            $order = "desc";
        }
     elseif ($sort=="original-order") {
        $select = sprintf('SELECT `g_id` AS id,
        `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=4');
    } 
    if (!$select) {
        $select = sprintf('SELECT DISTINCT `g_id` AS id,
    `g_photo` AS "image" , `g_name` AS  name, `g_country` AS country FROM `guitar` WHERE id_vid=4 ORDER BY %s %s LIMIT 12', $column, $order);
    } 
     
        $tovar = mysqli_query($link, $select);
        foreach ($tovar as $tov) {
            printf('
            <!-- Single Product Start -->
                                                    
            <div class="col-sm-4 fix">
            <div class="product-item fix">
        
                    <div class="product-img-hover">
            <!-- Product image -->

        <a class="pro-image fix" href="/guitar_details.php?id=%s"> <img src="%s" alt="product" width="270px" height="246px"/></a>
            <!-- Product action Btn -->
            
            </div>
        
            <!-- Product Name -->
            <div class="pro-name">
                <a href="/guitar_details.php?id=%s">%s</a>
                
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