
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
                    

                        <div class="col-xs-6">

                        <?php
                        add_category();

                        ?>

                        

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title"></input>
                                
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>



                            <?php 

                            if(isset($_GET['edit'])){

                               $cat_id = $_GET['edit'];

                                 include "includes/edit_categories.php";

                            }



                            ?>


                        </div>


                        <div class="col-xs-6">
                            
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th>Remove</th>
                                        <th>Update</th>
                                <tbody>

                                    <tr>

                           <?php 
                           show_table();
                            ?>

                            <?php 

                            delete_categories();

                            ?>




                                    </tr>
                                </tbody>

                           
                            </table>
                        </div>






                     </div>   <!-- col-lg -->
                    

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->



<?php include "includes/admin_footer.php"; ?>