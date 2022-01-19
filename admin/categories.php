<?php include "includes/header.php"?> 
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
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">
                            <?php insert_categories()?>
                            <?php include "includes/categories/form_add_categories.php"?>
                        
                            <?php include "includes/categories/form_update_categories.php"?>
                        </div>
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Tittle</th>
                                    </tr>
                                    <tbody>
                                        
                                        <?php showAllCategories();?>
                                        <?php deleteCategories();?>
                                        
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include "includes/footer.php"?> 


