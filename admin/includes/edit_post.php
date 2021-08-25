   <?php 

   		if (isset($_GET['p_id'])) 
   		{
   			$the_post_id = $_GET['p_id'];
   		}
   		
   		if(!$the_post_id){

   			header("location: posts.php");
   		}


        $query = "SELECT * FROM post WHERE post_id = $the_post_id";
        $select_post_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_post_by_id))
        {

            $id = $row['post_id'];
            $author = $row['post_author'];
            $title = $row['post_title'];
            $category = $row['post_category_id'];
            $status = $row['post_status'];
            $images = $row['post_image'];
            $tags = $row['post_tags'];
            $content = $row['post_content'];
		}


			if(isset($_POST['edit_post']))
			{

			$post_title = $_POST['post_title'];
			$post_author = $_POST['post_author'];
			$post_category_id = $_POST['post_category'];
			$post_status = $_POST['post_status'];
			$post_image = $_FILES['image']['name'];
			$post_image_temp = $_FILES['image']['tmp_name'];
			$post_tags = $_POST['post_tags'];
			$post_content = $_POST['post_content'];
			

			move_uploaded_file($post_image_temp, "../images/$post_image");


			if(empty($post_image))
			{
				$query_image = "SELECT * FROM post WHERE post_id = {$the_post_id}";
				$select_image = mysqli_query($connection, $query_image);

				while($row = mysqli_fetch_assoc($select_image))
				{

					$post_image = $row['post_image'];
				}

			}


			


			$query  = "UPDATE post SET ";
			$query .= "post_title = '{$post_title}', "; 
			$query .= "post_category_id = '{$post_category_id}', ";
			$query .= "post_date = now(), ";
			$query .= "post_author = '{$post_author}', ";
			$query .= "post_status = '{$post_status}', ";
			$query .= "post_tags = '{$post_tags}', ";
			$query .= "post_content = '{$post_content}', ";
			$query .= "post_image = '{$post_image}' ";
			$query .= " WHERE post_id = {$the_post_id} ";

			// global $connection;

			$update_post = mysqli_query($connection, $query);

			if($update_post);
			{

				echo "<h1> successfully Updated </h1>";
				die();
				
			} 	

		}


?>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Edit Title</label>
		<input value="<?php echo $title;?>" type="text" class="form-control" name="post_title">
		
	</div>

  <div class="form-group">
  	<label for="post_category">Choose Category</label>
	<select name="post_category" id="" class="form-control">
		<?php 

			$query = "SELECT * FROM categories";

			$select_categories = mysqli_query($connection, $query);
			
			confirm($select_categories);

	        while($row = mysqli_fetch_assoc($select_categories))
	        {

                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_name'];


                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }


		?>


	</select>
	
	</div>


	<div class="form-group">
		<label for="post_author">Edit Author</label>
		<input value="<?php echo $author;?>" type="text" class="form-control" name="post_author">
		
	</div>
	

	<div class="form-group">
		<label for="post_status">Edit Status</label>
		<input value="<?php echo $status;?>" type="text" class="form-control" name="post_status">
		
	</div>


	<div class="form-group">
		<label for="post_image">Change image</label>
		<input type="file" class="form-control" name="image"> <br>
		<img width="100" src="../images/<?php echo $images;?>">
		
	</div>

	<div class="form-group">
		<label for="post_tags">Edit Tags</label>
		<input value="<?php echo $tags;?>" type="text" class="form-control" name="post_tags">
		
	</div>


	<div class="form-group">
		<label for="post_content">Edit Content</label>
		<textarea  type="text" class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $content;?>
		</textarea> 
	</div>


	<div class="form-group">
		<input class="btn btn-primary" type="submit" name="edit_post" value="Publish Post">

	</div>


</form>