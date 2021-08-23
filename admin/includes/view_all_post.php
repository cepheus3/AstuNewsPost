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
                                </tr>
                            </thead>

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



                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $author; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo $category; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><img width="100" src="../images/<?php echo $images;?>"></td>
                                    <td><?php echo $tags; ?></td>
                                    <td><?php echo $comments; ?></td>


                                  <?php } ?>  
                                    
                                </tr>
                            </tbody>
                        </table>
                    