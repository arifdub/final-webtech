        

            <!-- Blog Search Well -->
                <div class="well search-well">
                    <h4>Find a Recipe</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                Search
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
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
                                <li><a href="#"><?php echo $row['cat_name']; } ?></a>
                                
                                </li>
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

               

            