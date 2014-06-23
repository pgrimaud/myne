<?php
    include 'header.php';
?>
<div class="container">
    <div class="row clearfix">
        <h3 class="text-center">
            Rédiger son avis
        </h3>
        <form role="form">
            <div class="form-group">
                 <label for="exampleInputEmail1">Email address</label><input type="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                 <label for="exampleInputPassword1">Password</label><input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                 <label for="exampleInputFile">File input</label><input type="file" id="exampleInputFile">
                <p class="help-block">
                    Example block-level help text here.
                </p>
            </div>
            <div class="checkbox">
                 <label><input type="checkbox"> Check me out</label>
            </div> <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
<hr>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <h3 class="text-center">
                Mes 3 derniers avis
            </h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/people">
                        <div class="caption">
                            <h3>
                                Thumbnail label
                            </h3>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/city">
                        <div class="caption">
                            <h3>
                                Thumbnail label
                            </h3>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <img alt="300x200" src="http://lorempixel.com/600/200/sports">
                        <div class="caption">
                            <h3>
                                Thumbnail label
                            </h3>
                            <p>
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                            </p>
                            <p>
                                <a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
