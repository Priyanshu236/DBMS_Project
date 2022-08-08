<?php
	$getcatid = $_GET['catid'];
	$getcategory = $_GET['category'];
	
	require_once('inc/dbconfig.php');
?>
	<div class="container ">
		<div class="row">
			<div>
				<h1>Posts in <?php echo $getcategory; ?></h1>
			</div>
			<?php

				$query = "SELECT id, postTitle, description, post_date, author, catinfo FROM blog_posts WHERE catinfo='$getcatid' ORDER BY id DESC";
				$result = mysqli_query($con,$query);

				if ($result && mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
						echo '<div class="postbox" style="margin: 20px">';
			                echo '<h1 id="posttitle"><a href="viewpost.php?id='.$row['id'].'&title='.$row['postTitle'].'">'.$row['postTitle'].'</a></h1>';
			                echo '<p id="postdate"><i>Posted on '.date('jS M Y H:i:s', strtotime($row['post_date'])).'</i> by '.$row['author'].' in ';

			///////////////////////////////////  Categoty Code //////////////////////////////////////////////////////
				
						$forcat = "SELECT catID, catTitle, catDesc FROM blog_cats WHERE catID = ".$row['catinfo']."";
						$result1 = mysqli_query($con,$forcat);
						if ($result1 && mysqli_num_rows($result1) > 0)
						{
							while($row1 = mysqli_fetch_assoc($result1))
							{			
								echo '<a href="viewbycat.php?catid='.$row1['catID'].'&category='.$row1['catTitle'].'">'.$row1['catTitle'].'</a></p>';
							}
						}
							

			/////////////////////////////////// Categoty Code end //////////////////////////////////////////////////////

			                echo '<p><h4 id="description">'.$row['description'].'</h4></p>';                
			                echo '<p><a class="btn btn-sm btn-primary" href="viewpost.php?id='.$row['id'].'&title='.$row['postTitle'].'">Read More</a></p>';                
			            	echo '</div>';
					}
				}
				else
				{
					echo '<div class="alert alert-warning text-center col-md-offset-4 col-md-4"><h3>Sorry no posts found <?php echo "under".$getcategory; ?></h3></div>';
					die();
				}

				mysqli_close($con);

			?>

			</div>
		</div>

</body>
</html>
