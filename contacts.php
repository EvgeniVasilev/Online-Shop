<?php
require_once 'templates/head.php';
?>
    <div class="container-fluid window">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <form>
                    <h1>
                        <small>Write a Question</small>
                    </h1>
                    <div class="form-group">
                        <label class="label label-default" for="name">FULL NAME:</label>
                        <br/>
                        <br/>
                        <input type="text" id="name" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="label label-default" for="email">E-MAIL:</label>
                        <br/>
                        <br/>
                        <input type="email" id="email" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label class="label label-default" for="message">MESSAGE:</label>
                        <br/>
                        <br/>
                        <textarea class="form-control" id="message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Mail Us" class="btn btn-primary form-control"/>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="col-lg-offset-4">
                    <h1>
                        <small>
                            Google Map Goes Here
                        </small>
                    </h1>
                </div>
            </div>
        </div>
    </div>
<?php
require_once 'templates/footer.php';
