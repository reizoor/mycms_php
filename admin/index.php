<?php include "./includes/header.php"?> 
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <?php include  "includes/navegation.php"?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small><?php echo $_SESSION['username']; ?> </small>
                        </h1>
                    </div>
                </div>
            </div>
                   
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM posts";
                    $select_all_posts = mysqli_query($connection, $query);
                    $posts_counts     = mysqli_num_rows($select_all_posts);

                    echo "<div class='huge'>{$posts_counts}</div>";

                    ?>
                            <div>Posts</div>
                        </div>
                    </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM comments";
                    $select_all_comments = mysqli_query($connection, $query);
                    $comments_counts     = mysqli_num_rows($select_all_comments);

                    echo "<div class='huge'>{$comments_counts}</div>";

                    ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM users";
                    $select_all_users = mysqli_query($connection, $query);
                    $users_counts     = mysqli_num_rows($select_all_users);

                    echo "<div class='huge'>{$users_counts}</div>";

                    ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                    $query = "SELECT * FROM categories";
                    $select_all_categories = mysqli_query($connection, $query);
                    $categories_counts     = mysqli_num_rows($select_all_categories);

                    echo "<div class='huge'>{$categories_counts}</div>";

                    ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    
</div>
<div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>     <!-- /.row -->
        </div>
    
        
    </div>

    <?php 
    //Counts draft posts for dashboard
    $query = "SELECT * FROM posts where post_status = 'draft'";
    $select_draft_posts = mysqli_query($connection, $query);
    $draft_posts_counts = mysqli_num_rows($select_draft_posts);

    //Counts published posts for dashboard
    $query = "SELECT * FROM posts where post_status = 'published'";
    $select_published_posts = mysqli_query($connection, $query);
    $published_posts_counts = mysqli_num_rows($select_published_posts);

    //Counts Unapproved comments for dashboard
    $query = "SELECT * FROM comments where comment_status = 'Unapproved'";
    $select_unapproved_comments = mysqli_query($connection, $query);
    $unapproved_comments_counts = mysqli_num_rows($select_unapproved_comments);

    //Counts Approved comments for dashboard
    $query = "SELECT * FROM comments where comment_status = 'Approved'";
    $select_approved_comments   = mysqli_query($connection, $query);
    $approved_comments_counts   = mysqli_num_rows($select_approved_comments);
    
    //Counts Admins users for dashboard
    $query = "SELECT * FROM users where user_role = 'admin'";
    $select_admin_users   = mysqli_query($connection, $query);
    $admin_users_counts   = mysqli_num_rows($select_admin_users);
    
    ?>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          ['Draft Posts', <?php echo $posts_counts;?>],
          ['Published Posts', <?php echo $posts_counts;?>],
          ['Unapproved Comments', <?php echo $unapproved_comments_counts;?>],
          ['Approved Comments', <?php echo $approved_comments_counts;?>],
          ['Users', <?php echo $users_counts;?>],
          ['Admin Users', <?php echo $admin_users_counts;?>],
          ['Categories', <?php echo $categories_counts;?>],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<?php include "includes/footer.php"?> 


