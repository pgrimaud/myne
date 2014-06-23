<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo BASE_URL; ?>/index.php">Myne</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?php echo ($tab_name['filename'] == 'add_review') ? 'active' : ''; ?>">
                    <a href="<?php echo VIEW_URL; ?>/add_review.php">Rédiger un avis</a>
                </li>
                <li class="<?php echo ($tab_name['filename'] == 'self_review') ? 'active' : ''; ?>">
                    <a href="<?php echo VIEW_URL; ?>/self_review.php">Mes avis</a>
                </li>
                <li class="<?php echo ($tab_name['filename'] == 'all_review') ? 'active' : ''; ?>">
                    <a href="<?php echo VIEW_URL; ?>/all_review.php">Tous les avis</a>
                </li>
            </ul>
            <form class="navbar-form navbar-right" role="search" id="search-input">
                <div class="form-group">
                    <input type="text" class="form-control">
                </div> <button type="submit" class="btn btn-default">Rechercher</button>
            </form>
        </div>
    </div>
</nav>
