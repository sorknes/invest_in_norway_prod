<header id="main_header" class="main-header nav-down" role="banner">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <div class="navbar-menu hidden-xs">
                        Menu
                    </div>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>" title="Invest in Norway"><span>Investing</span><em>in</em><span>Norway</span></a>
            </div> <!-- /. navbar-header -->
            <div id="navbar" class="navbar-collapse collapse">
                <?php
                    if (has_nav_menu('primary_navigation')) :
                        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav navbar-right']);
                    endif;
                ?>
            </div> <!-- /.navbar-collapse -->
            <button class="navbar-right btn btn-well collapsed" type="button" data-toggle="collapse" data-target="#search_container" aria-expanded="false" aria-controls="#search_container"></button>
            <div class="collapse" id="search_container">
                <div class="well">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search here...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-search" type="button">Search</button>
                                    </span>
                                </div> <!-- /.input-group -->
                            </div> <!-- /.col -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </div> <!-- /.well -->
            </div> <!-- /.collapse -->
        </div> <!-- /.container-fluid -->
    </nav> <!-- /.navbar -->
</header> <!-- /.nav-down -->
