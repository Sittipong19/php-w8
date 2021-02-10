<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>php-id-w10-title-edit</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-color: cornflowerblue;">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขข้อมูลแคคตัส</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $ca_id     = $_GET['ca_id'];
                        $ca_name   = $_GET['ca_name'];
                        $ca_type   = $_GET['ca_type'];
                        $ca_service   = $_GET['ca_service'];
                        $sql        = "update cactus set ca_name='$ca_name',ca_type='$ca_type',ca_service='$ca_service' where ca_id='$ca_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มแคคตัส $ca_name เรียบร้อยแล้ว<br>";
                        echo '<a href="cactus_list.php">แสดงแคคตัสทั้งหมด</a>';
                    }else{
                        $fca_id = $_REQUEST['ca_id'];
                        $sql =  "SELECT * FROM cactus where ca_id='$fca_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fca_name = $row['ca_name'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="cactus_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="ca_id" id="ca_id" value="<?php echo "$fca_id";?>">
                        <div class="form-group">
                            <label for="ca_name" class="col-md-2 col-lg-2 control-label">name</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ca_name" id="ca_name" class="form-control" value="<?php echo "$fca_name";?>">
                            </div>
                        <div class="form-group">
                            <label for="ca_type " class="col-md-2 col-lg-2 control-label">type</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ca_type " id="ca_type " class="form-control" value="<?php echo "$fca_name";?>">
                            </div>                       
                        <div class="form-group">
                            <label for="ca_service" class="col-md-2 col-lg-2 control-label">service</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="ca_service" id="ca_service" class="form-control" value="<?php echo "$fca_name";?>">
                            </div>            
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>คณะวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ</address>
            </div>
        </div>    
    </body>
</html>