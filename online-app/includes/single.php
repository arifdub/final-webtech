<div class="row">
    <div class="col-md-12">

        <?php
//connect database and get single post 
            include("db.php");
            $post_id = $_GET['id'];
            $user_id = $_SESSION['user_id'];
            $run = $conn->prepare("select * from posts where post_id = $post_id");
            $run->execute();
            while($row = $run->fetch(PDO::FETCH_ASSOC)){



        ?>
        <div class="img-full"><img src="img/<?php echo $row['post_pic']; ?>" width="400" height="300px"></div>
            <h4><?php echo $row['post_title']; ?></h4>
            <p><?php echo $row['post_desc']; ?>
            </p>
            <?php } ?> <!--     endwhile loop posts-->
        <div class="comments">
              <h4>Leave rating and comments for this post below</h4>
               <?php 
                $run = $conn->prepare("select * from comments c inner join users u on c.user_id = u.user_id where post_id=$post_id");
                $run->execute();
                while($row = $run->fetch(PDO::FETCH_ASSOC)){
                    ?>

             <div class="alert alert-info"><span style='color:red'><?php echo $row['username']; ?></span> says: <?php echo $row['comment']; ?> </div>
                <?php } ?> <!--end while loop of comments-->

        </div>
<!--show only if user is logged in for leaving comment and rating-->
        <?php if(isset($_SESSION['user_id'])){ ?>
        <div class="ratings">
        <form id="rating-form">
           <ul id="rating-ul"> 
                <li>
                <label for="star1"><i class="fa fa-star fa-2x" id="f-star1"></i></label> 
                <input type="radio" id="star1" name="star" hidden="hidden" value="1">
                </li>
                <li>
                <label for="star2"><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true fa-2x"></i></label>
                <input type="radio" id="star2" name="star" hidden="hidden" value="2">
                </li>
                <li>

                <label for="star3"><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i></label>
                <input type="radio" id="star3" name="star" hidden="hidden" value="3">
                </li>
                <li>

                <label for="star4"><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i></label>
                <input type="radio" id="star4" name="star" hidden="hidden" value="4">
               </li>
                <li>

                <label for="star5"><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i><i class="fa fa-star fa-2x" aria-hidden="true"></i></label>
                <input type="radio" id="star5" name="star" hidden="hidden" value="5">
                </li>
         </ul>
            <input type="hidden" name="post" value="<?php echo $post_id; ?>">
            <input type="hidden" name="user" value="<?php echo $user_id; ?>">
        </form>
        <span class="info" style="color:green"></span>
        </div>


        <form id="comments-form" method="post">


            <div id="comment-area"></div>   
            <div class="form-group">
             <input type="text" name="post" hidden="hidden" value="<?php echo $_GET['id']; ?>">
              <label for="comment">Leave Comment:</label>
              <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
              </div>
              <div class="form-group">
              <input type="submit" class="btn btn-success pull-right" name="comment" value="Post Comment">
            </div>
        </form>
<!--        end if statment for show comment area-->
        <?php } else { 
                echo "<strong>Please login to leave comments or rating</strong>";
            } ?>

</div>


</div>