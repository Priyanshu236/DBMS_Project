<?php


function getcategoriesmenu($table)
{
    $res="";
	require("inc/dbconfig.php");
	$sql="SELECT * FROM $table ";
	if ($result=mysqli_query($con,$sql))
	{
      	//count number of rows in query result
		$rowcount=mysqli_num_rows($result);
      	//if no rows returned show no categories alert
		if ($rowcount==0) {
      		# code...
              $res= 'No Categories';
            }
            //if there are rows available display all the results
            foreach ($result as $blog_categories => $category) {
                # code...
                $res=$res. '<a class="dropdown-item" href="viewbycat.php?id='.$category['catID'].'">'.$category['catTitle'].'</a>
                <div class="dropdown-divider"></div>';
            }
        }
   
        return $res;
    }
?>