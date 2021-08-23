<form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat_title"> Edit Category</label>


                                    <?php 

                                    if(isset($_GET['edit'])){

                                    $cat_id = $_GET['edit'];

                                    $select_cat_id = "SELECT * FROM categories WHERE cat_id= $cat_id";

                                    $select_query = mysqli_query($connection, $select_cat_id);

                                    while($row = mysqli_fetch_assoc($select_query))
                                    {

                                        $cat_id = $row['cat_id'];
                                        $cat_title = $row['cat_name'];
                                         ?>

                                        <input value="<?php if(isset($cat_title)) {echo $cat_title;}?>" type="text" class="form-control" name="cat_title"></input>

                                       
                                    <?php }}  ?>



                                    <?php 

                                    if(isset($_POST['update_category']))
                                    {


                                        $cat_title = $_POST['cat_title'];
                                        

                                        $edit_query = "UPDATE categories SET cat_name='{$cat_title}' WHERE cat_id = {$cat_id}";

                                        $update_query = mysqli_query($connection, $edit_query);

                                        if(!$update_query){

                                            die("Request failed" . mysqli_error($connection));
                                        }
                                        else
                                        {
                                            header("location: categories.php");
                                        }


                                    }

                                    ?>
                                    
                                
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
                                </div>
                            </form>