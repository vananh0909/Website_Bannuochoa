<div class="clear"></div>
<div class="main">
    <?php
                  if(isset($_GET['action']) && $_GET['query']){
                        $tam = $_GET['action'];
                        $query = $_GET['query'];
                  }else{
                    $tam ='';
                    $query ='';
                  }
                  if($tam=='quanlydanhmucsanpham' && $query == 'them'){
                       include("modul/quanlydanhmucsp/them.php");
                       include("modul/quanlydanhmucsp/lietke.php");
                  } elseif($tam=='quanlydanhmucsanpham' && $query == 'sua'){
                       include("modul/quanlydanhmucsp/sua.php");
     
                  }elseif($tam=='quanlysp' && $query == 'them'){
                    include("modul/quanlysp/them.php");
                    include("modul/quanlysp/lietke.php");
                  }elseif($tam=='quanlysp' && $query == 'sua'){
                    include("modul/quanlysp/sua.php");
                }elseif($tam=='quanlydonhang' && $query == 'lietke'){
                  include("modul/quanlydonhang/lietke.php");
              }elseif($tam=='donhang' && $query == 'xemdonhang'){
                include("modul/quanlydonhang/xemdonhang.php");
            }elseif($tam=="quanlydonhang" && $query == 'tinnhan'){
              include("modul/tinnhan/tinnhan.php");
            }else{
                      include("modul/bieudo.php");
                  }
    ?>
</div>