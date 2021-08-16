<?php 


function delete_categories()
{

if(isset($_GET['delete']))
         {
            global $connection;

            $the_cat_id = $_GET['delete'];
            $delete_query = "DELETE FROM categories where cat_id={$the_cat_id}";

            $delete = mysqli_query($connection, $delete_query);

            header("location: categories.php");
        
        }
}


function show_table()
{
   global $connection;

   $query = "SELECT * FROM categories";

   $select = mysqli_query($connection, $query);

   while($row = mysqli_fetch_assoc($select))
   {
      $cat_id = $row['cat_id']; 
      $cat_name = $row['cat_name'];
      echo "<tr>";
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_name}</td>";
      echo "<td> <a href='categories.php?delete={$cat_id}'> Delete </a> </td>";
      echo "<td> <a href='categories.php?edit={$cat_id}'> Edit </a> </td>";
      echo "</tr>";
   }
}


function add_category()
{
   global $connection;
   if (isset($_POST['submit'])) 
   {
                           
            $cat_title = $_POST['cat_title'];

            if($cat_title == "" || empty($cat_title))
            {

                 echo "<p style='color:red'> This field should not be empty </p>";

            }
            else
            {

               $query = "INSERT INTO categories(cat_name)";
               $query .= "VALUES('{$cat_title}')";

               $create_category = mysqli_query($connection, $query);

               if (!$create_category)
               {
                   die("Request failed" . mysqli_error($connection));
               }


            }


   } 


}

?>