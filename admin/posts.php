<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

      <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                        <?php 
                          if (isset($_GET['source'])) {
                              $source = $_GET['source'];
                          }  else {
                              $source = '';
                          }
                          switch ($source){
                              case 'add_post';
                                include "includes/add_post.php";
                                  break;
                                  case 'edit_post';
                                    include "includes/edit_post.php";
                                    break;
                                    case '200';
                                  echo "NICE 200";
                                  break;
                                  default:
                                  include "includes/view_all_posts.php";
                                break;
                          }
                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php"; ?>