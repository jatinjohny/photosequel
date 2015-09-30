<div class="row">
    <div class="col-xs-12">
        <form class="form form-inline" action="" method="post">
            <div class="well well-lg">
                <div class="form-group <?= $class ?>">
                    <input type="text" name="user" class="form-control" placeholder="Username/Email" required="true">
                </div>

                <div class="form-group <?= $class ?>">
                    <input type="password" name="pass" class="form-control <?= $class ?>" placeholder="Password" required="true">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name="login">Log In</button>
                </div>
            </div>
        </form>
    </div>
</div>
