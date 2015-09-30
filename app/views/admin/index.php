<div class="row">
    <div class="col-md-12">
        <div class="well well-lg">
            <div class="page-header">
                <h1>Admin Dashboard</h1>
                <h3>Hello <?= $_SESSION['username'] ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item"><a href="">Change Password</a> </li>
            <li class="list-group-item"><a href="">Logout</a> </li>
        </ul>
    </div>

    <div class="col-md-10">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Upload Image
                    </div>
                    <div class="panel-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="image" required="true">
                            </div>
                            <div class="form-group">
                                <input type="text" id="caption" name="caption" class="form-control" placeholder="Caption" required="true">
                            </div>
                            <button class="btn btn-primary" type="submit" name="upload">Upload</button>
                        </form>
                    </div>
                    <div class="panel-footer">
                        <div class="thumbnail">// TODO <br>Show Image Preview here</div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Latest Comments
                    </div>
                    <div class="panel-body">
                        //PHP code here
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>
