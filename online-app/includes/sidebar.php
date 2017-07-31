        

<!-- Post Search form -->
<div class="well search-well">
    <h4>Find a Post</h4>
   <form action="index.php?search" method="get" class="form-inline">
       <div class="form-group">
            <input type="text" class="form-control" name="search" id="search">
            <input class="btn btn-default" type="submit" value="Search">
        </div>
    </form>

</div>

 <!-- Post Categories -->
<div class="well catagories">
    <h4>Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
                <?php 
//                get catagories from database and display
                    include("db.php");
                    $run = $conn->prepare("select * from catagories");
                    $run->execute();
                    while($row = $run->fetch(PDO::FETCH_ASSOC)){
                ?>
                <li><a href="index.php?catagory=<?php echo $row['cat_id']; ?>" ><?php echo $row['cat_name']; } ?></a>

                </li>

            </ul>
        </div>

    </div>
    <!-- /.row -->
</div>
<!--display add here-->
<div class="side-add">
   <a href="#"><img src="http://lorempixel.com/400/200/" class="banner-img"></a>
   <div class="text-side-ad">
       <h2>Place Your ad here</h2>
   </div>
</div>

            