

 <div class="col-md-4">
<!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="POST">
                        <div class="input-group">
                            <input name="search"type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit"class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form> 
                    <!-- /.input-group -->
                </div>



        <?php 

            
        ?>



                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">


                        <?php 
                            $query = "SELECT * FROM categories";

                            $select = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select))
                            {
                                $cat_name = $row['cat_name'];
                                echo "<li> <a href='#'>{$cat_name}</a> </li>";

                            }

                        ?>
                              
                            </ul>
                        </div>



                        <!-- /.col-lg-6 -->
                        
                       
                    </div>
                    <!-- /.row -->
                </div>

           
            </div>