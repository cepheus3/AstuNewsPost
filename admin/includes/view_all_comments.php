 <table class="table table-bordered table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comments</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In Response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    
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

                                $query = "SELECT * FROM comments";
                                $select_comments = mysqli_query($connection, $query);

                                while($row = mysqli_fetch_assoc($select_comments)){

                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author']; 
                                    $comment_content = $row['comment_content'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                echo "<tr>";
                                echo "<td> $comment_id </td>";
                                echo "<td> $comment_author </td>";
                                echo "<td> $comment_content </td>";
                                
                                // $query_cat = "SELECT * FROM categories WHERE cat_id ={$category}";


                                //      $select_categories_id = mysqli_query($connection,  $query_cat);
                                    
                                   
                                //      while($row= mysqli_fetch_assoc($select_categories_id))
                                //      {
                                //         $cat_id = $row['cat_id'];
                                        
                                //         $cat_title = $row['cat_name'];
                                                      
                                //         echo "<td> $cat_title </td>";

                                //      }

                                echo "<td> $comment_email </td>";
                                echo "<td> $comment_status </td>";
                                echo "<td> $comment_post_id </td>";
                                
                                echo "<td> $comment_date </td>";
                                echo"<td> <a href='posts.php?source=edit_post&p_id='> Approve</a></td>";

                                echo"<td> <a href='posts.php?source=edit_post&p_id='> Unapprove</a></td>";

                                echo "<td> <a href='posts.php?delete='> Delete</a></td>";
                                 
                                echo "</tr>";
                                   } 
                                   ?>  
                                    
                                </tr>
                            </tbody>
                        </table>
                    