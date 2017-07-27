        

            <!-- Blog Search Well -->
                <div class="well search-well">
                    <h4>Find a Post</h4>
                    
                       <form action="http://localhost:8888/Final-Project/recipe-app/?search" method="get" class="form-inline">
                           <div class="form-group">
                            <input type="text" class="form-control" name="search">
                                <input class="btn btn-default" type="submit" value="Search">
                            </div>
                        </form>
                    
                </div>

                <!-- Blog Categories Well -->
        <div class="well catagories">
                    <h4>Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                                <?php 
                                    include("db.php");
                                    $run = $conn->prepare("select * from catagories");
                                    $run->execute();
                                    while($row = $run->fetch(PDO::FETCH_ASSOC)){
                                        
                                    
                                ?>
                                <li><a href="http://localhost:8888/Final-Project/recipe-app/?catagory=<?php echo $row['cat_id']; ?>" ><?php echo $row['cat_name']; } ?></a>
                                
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

               

            