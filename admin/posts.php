
<?php include "includes/admin_header.php";?>
<?php include "function.php"; ?>
    <div id="wrapper">
      
      


        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?> 


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">

                    <div class="col-lg-12">
                        
                        <h1 class="page-header">
                            WELCOME
                            <small>Nebiyou</small>
                        </h1>


                       <?php


                       if(isset($_GET['source'])){

                            $source = $_GET['source'];
                       }else{

                            $source = "";
                       }


                       switch ($source) {
                           case 'add_post':
                               include "includes/add_post.php";
                               break;


                           case '12':
                            echo "helo 12";
                            break;

                           case '45':
                           echo "helo 45";
                           break;
                       
                           default:
                               include "includes/view_all_post.php";
                               break;
                       }


                        ?>

                      
                     </div>   <!-- col-lg -->
                    

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>