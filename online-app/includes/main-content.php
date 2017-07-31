<div class="row">
    <?php 
//        database connection
        include("db.php");
//    get posts from database with users detail and rating all join three tables or display by rating
        $run = $conn->prepare("select posts.post_id, posts.post_pic, posts.post_title, posts.post_desc, posts.date, users.username, AVG(ratings.rating) as avgrating, count(ratings.rating) as count_post from posts left join ratings on posts.post_id = ratings.post_id inner join users on users.user_id = posts.user_id group by posts.post_id order by avgrating Desc ");
        $run->execute();
        while($row = $run->fetch(PDO::FETCH_ASSOC)){ 
    ?>

        <div class="col-xs-12 well">
           <div class="post-img col-md-3">
               <a href="index.php?id=<?php echo $row['post_id']; ?>"><img class= "recipe-pic" src="img/<?php echo $row['post_pic']; ?>" width="100%" height="100%"></a>
             </div>
            <div class="content col-md-9">
                <a href="index.php?id=<?php echo $row['post_id']; ?>"><h4><?php echo $row['post_title']; ?></h4></a>
<!-- display 200 words of description of post-->
                    <p><?php echo substr($row['post_desc'],0, 200); ?></p>


                <div class="container-fluid">
                    <div class="row lead">
<!--show rating star average-->
                        <div id="hearts-existing" class="starrr" data-rating="<?php echo round($row['avgrating']); ?>"></div> <span style="font-size:15px;"><?php echo $row['count_post']; ?> Review(s)</span>

                    </div>
                </div>
                <div>

                    <p>Uploaded by: <span style="color:blue;"><?php echo $row['username']; ?></span> </p>
                    <p>Date: <?php echo $row['date']; ?></p> 
                </div>
            </div>
        </div><!--col-md-4-->
       <?php } ?><!--endwhile loop for posts--> 
</div><!--row-->
 

