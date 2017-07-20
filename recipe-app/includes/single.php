<div class="row">
                    <div class="col-md-12">
                           
                            <?php
                                
                                include("db.php");
                                $post_id = $_GET['id'];
                                $run = $conn->prepare("select * from posts where post_id = $post_id");
                                $run->execute();
                                while($row = $run->fetch(PDO::FETCH_ASSOC)){
                                    
                               
                        
                            ?>
                            <img src="img/<?php echo $row['post_pic']; ?>">
                            <h4><?php echo $row['post_title']; ?></h4>
                            <p><?php echo $row['post_desc']; ?>
                               </p>
                            <?php } ?>
<!--                            endwhile loop-->
                         <div class="comments">
                                  <h4>All comments below:</h4>
                                   <?php 
                                    $run = $conn->prepare("select * from comments c inner join users u on c.user_id = u.user_id where post_id=$post_id");
                                    $run->execute();
                                    while($row = $run->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                            
                             <div class="alert alert-info"><span style='color:red'><?php echo $row['username']; ?></span> says: <?php echo $row['comment']; ?> </div>
                                    <?php } ?>
                            
                            </div>
                            
                          <?php if(isset($_SESSION['user_id'])){ ?>
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
                            <?php } else {
                                    echo "<strong>Please login to leave comments</strong>";
                                } ?>
                        </div>

</div>