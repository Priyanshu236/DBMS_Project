
            
            <!-- Grid item -->
            
<?php
 require('inc/dbconfig.php'); ?>

<section class="py-5 header text-center">
    <div class="container py-4">
        <header>
            <h1 class="display-4">Blog Website</h1>
            <p class="font-italic text-muted mb-1">Create and upload blogs easily through our Website</p>
        
        </header>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
               <?php
                    $query = "SELECT id, postTitle, description, post_date, author, catinfo,imgUrl FROM blog_posts ORDER BY id DESC";
                    $result = mysqli_query($con,$query);
                    if(!$result || mysqli_num_rows($result)==0)
                    {
                        echo 'noting';
                    }
                    else
                    {
                        while($row= mysqli_fetch_assoc($result))
                        {
        
                                $text=$row['description'];
                                if(strlen($text)>100)
                                {
                                    $str2='...';
                                    $text=substr($text,0,97);
                                    $text=$text.$str2;
                                }
                                
                                echo '<div class="col-lg-4 col-md-6 grid-item mb-4">';
                                echo '<a href="viewpost.php?id='.$row['id'].'&title='.$row['postTitle'].'">';
                                echo'<img class="img-fluid w-100 mb-3 img-thumbnail shadow-sm rounded-0" src='.$row['imgUrl'].' alt="">';
                                echo '</a>';
                                echo '<h2 class="h4">'.$row['postTitle'].'</h2>';
                                echo '<p class="small text-muted font-italic">'.$text.'</p>';
                                echo '</div>';
                      
                        }
                    }
               ?>
           
           
    </div>
    </div>
                </div>
<footer class="p-4 bg-light d-flex align-items-center justify-content-center">
    <small class="mb-0 text-uppercase font-weight-bold mr-3">Resources: </small>
    <ul class="list-inline mb-0 d-inline-block">
        <li class="list-inline-item">
            <a class="text-muted font-italic" target="_blank" ><u>Priyanshu </u></a>
        </li>
        <li class="list-inline-item">
            <a class="text-muted font-italic" target="_blank" ><u>Prasham</u></a>
        </li>
        <li class="list-inline-item">
            <a class="text-muted font-italic" target="_blank" ><u>Ridda</u></a>
        </li>
        
    </ul>
</footer>
            </body>
            </html>