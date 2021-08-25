 <table class="table table-bordered table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Images</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Edit</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>

                            <?php 

                                
                            if(isset($_GET['delete']))
                                     {
                                        

                                        $the_post_id = $_GET['delete'];
                                        $delete_query = "DELETE FROM post where post_id={$the_post_id}";

                                        $delete = mysqli_query($connection, $delete_query);

                                        header("location: posts.php");
                                    
                                    }


                            ?>

                            <tbody>
                                <?php 

                                $query = "SELECT * FROM post";
                                $select_post = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_post)){

                                    $id = $row['post_id'];
                                    $author = $row['post_author'];
                                    $title = $row['post_title'];
                                    $category = $row['post_category_id'];
                                    $status = $row['post_status'];
                                    $images = $row['post_image'];
                                    $tags = $row['post_tags'];
                                    $comments = $row['post_comment_count'];



                                
                                echo "<tr>";
                                echo "<td> $id </td>";
                                echo "<td> $author </td>";
                                echo "<td> $title </td>";
                                
                                $query_cat = "SELECT * FROM categories WHERE cat_id ={$category}";


                                     $select_categories_id = mysqli_query($connection,  $query_cat);
                                    
                                   
                                     while($row= mysqli_fetch_assoc($select_categories_id))
                                     {
                                        $cat_id = $row['cat_id'];
                                        
                                        $cat_title = $row['cat_name'];
                                                      
                                        echo "<td> $cat_title </td>";

                                     }

                                   echo "<td> $status </td>";
                                   
                                   echo "<td><img width='100' src='../images/$images'></td>";
                                   echo "<td> $tags </td>";
                                   echo "<td> $comments </td>";
                                    
                                    echo"<td> <a href='posts.php?source=edit_post&p_id=$id;'> Edit</a></td>";


                                    echo "<td> <a href='posts.php?delete=$id'> Delete</a></td>";
                                     
                                    echo "</tr>";
                                   } 
                                   ?>  
                                    
                                </tr>
                            </tbody>
                        </table>
                    