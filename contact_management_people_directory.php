<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>contact management people directory - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="jquery.min.js"></script>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>
<body>

<div class="col-md-12">
    <div class="page-people-directory">
        <div class="row">
            <div class="col-md-3">
                <h5 class="page-title"><b>Contacts</b></h5>
                <ul class="nav nav-pills nav-stacked nav-contacts">
                    <li class="active">
                        <a href="#">
                            All Contacts
                            <span class="badge pull-right">128+</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            My Contacts
                            <span class="badge pull-right">87</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Skype Contacts
                            <span class="badge pull-right">10</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Google Contacts a
                            <span class="badge pull-right">65</span>
                        </a>
                    </li>
                </ul>
                
                <br>
                
                <h5><b>My Favorites</b></h5>
                <div class="list-group people-group">
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Wayne</h4>
                                <small>Software Engineer</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jane Dane</h4>
                                <small>Software Engineer</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Juan Dela Cruz</h4>
                                <small>Software Engineer</small>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Jose Cruz</h4>
                                <small>Software Engineer</small>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
            <div class="col-md-9">
                <div class="well">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Search people" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <div class="btn-group" style="display:block">
                              <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" style="width: 100%; border-radius: 0px; background: white;  color: gray; border-color: #ddd;">Last 10 days <span class="caret"></span></button>
                              <ul class="dropdown-menu bullet pull-right animated pulse margin-top-45">
                                <li>
                                  <input type="radio" id="ex1_1" name="ex1" value="1" checked="">
                                  <label for="ex1_1">Fullname</label>
                                </li>
                                <li>
                                  <input type="radio" id="ex1_2" name="ex1" value="2">
                                  <label for="ex1_2">Company</label>
                                </li>
                                <li>
                                  <input type="radio" id="ex1_3" name="ex1" value="3">
                                  <label for="ex1_3">Position</label>
                                </li>
                              </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <h3>All Contacts</h3>
                    </div>
                    <div class="col-md-6">
                         <button type="button" class="btn btn-green btn-raised btn-add-new-contact"><span class="icon-plus" data-toggle="modal" data-target="#modal-pull-right-add"> Add New Contact</span></button>
                    </div>
                </div>
                
                <div class="list-group contact-group">
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div><
                    </a>
                    
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar4.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    <a href="#" class="list-group-item">
                        <div class="media">
                            <div class="pull-left">
                                <img class="img-circle" src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="...">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">John Doe <small>Software Engineer at Facebook, Inc.</small></h4>
                                <div class="media-content">
                                    <i class="fa fa-map-marker"></i> San Francisco, California, United States
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-skype"></i> jdoe.doe</li>
                                        <li><i class="fa fa-mobile"></i> +63 912 212 2451</li>
                                        <li><i class="fa fa-envelope-o"></i> joedoe@email.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="pull-right">
                    <ul class="pagination pagination-split pagination-sm pagination-contact">
                        <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="modal modal-pull-right" data-easein="fadeInRight" data-easeout="fadeOutRight" id="modal-pull-right-add" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content animated fadeOutRight">
                    <div class="modal-body">
                        <div class="row modal-close">
                            <div class="col-md-12 padding-bottom-8 padding-top-8 bg-silver">
                                <h4 class="pull-left"><b>Create New Contact</b></h4>
                                <ul class="list-unstyled list-inline text-right">
                                    <li class="close-right-modal"><span class="fa fa-times fa-2x" data-dismiss="modal"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact-add-content">
                                    <form class="form-horizontal tabular-form margin-top-10">
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-10 tabular-border">
                                                <input type="text" class="form-control" id="name" placeholder="Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10 tabular-border">
                                                <input type="text" class="form-control" id="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10 tabular-border">
                                                <input type="text" class="form-control" id="phone" placeholder="Phone">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-10 tabular-border">
                                                <input type="text" class="form-control" id="address" placeholder="Address">
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-silver btn-flat">Cancel</button> <button type="button" class="btn btn-green btn-flat">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
body{
    margin-top:20px;
    background:#eee;
}

.nav.nav-pills > li > a {
    color: #777;
    border-radius: 0!important;
    margin-right: 10px;
    margin-left: 10px;
}

.nav.nav-pills > li.active > a, 
.nav.nav-pills > li.active > a:hover,
.nav.nav-pills > li.active > a:focus {
    color: #fff !important;
    background-color: #2ECC71 !important;

}

.page-people-directory .nav-contacts {
    margin-bottom: 20px;
}

.page-people-directory .nav-contacts li a {
    color: #666;
    font-weight: 400;
    font-size: 13px;
}

.page-people-directory .nav-contacts li .badge {
    background: none;
    font-weight: 500;
    color: #333;
}

.page-people-directory .nav-contacts li.active .badge {
    color: #fff;
    background: none;
}

.page-people-directory .people-group .media img {
    width: 45px;
}

.page-people-directory .people-group .list-group-item {
    -moz-transition: all 0.2s ease-out 0s;
    -webkit-transition: all 0.2s ease-out 0s;
    transition: all 0.2s ease-out 0s;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin: 0;
    border-width: 0;
}

.page-people-directory .people-group .media-heading {
    margin-top: 5px;
}

.page-people-directory .people-group .media-heading,
.page-people-directory .people-group .media-body {
    line-height: normal;
}

.page-people-directory .pagination-contact {
    margin-top: -3px;
}

.page-people-directory .contact-group {
    margin-top: 20px;
}

.page-people-directory .contact-group .media img {
    width: 80px;
}

.page-people-directory .contact-group .list-group-item {

}

.page-people-directory .contact-group .media-heading {
    font-size: 16px;
    font-weight: 500;
}

.page-people-directory .contact-group .media-heading small {
    margin-left: 5px;
    font-size: 13px;
    font-weight: 400;
    color: #999;
}

.page-people-directory .contact-group .list-group-item {
    border: none;
    margin-top: 10px;
}

.page-people-directory .contact-group .list-group-item:hover {
    background-color: #fcfcfc;
}

.page-people-directory .contact-group .media-content {
    margin-top: 5px;
}

.page-people-directory .contact-group .fa:before {
    font-size: 20px;
    color:gray;
}

.page-people-directory .contact-group .media-content ul {
    margin-top: 15px;
    margin-bottom: 0;
}

.page-people-directory .contact-group .media-content ul > li {
    display: inline-block;
    min-width: 200px;
    margin-bottom: 5px;
}

.page-people-directory .well {
    border-radius: 0px;
    border: none;
}

.page-people-directory .list-group-item:first-child {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

.page-people-directory .page-title {
    text-transform: uppercase;
}

.page-people-directory .btn-add-new-contact {
    float: right;
}

@media (max-width: 992px) { 
    .page-people-directory .btn-add-new-contact {
        float: left;
    }
}



/* ============================================================
CONTACT MODAL VIEW
============================================================ */
.page-people-directory .modal-pull-right .modal-dialog {
    max-width: 720px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body {
    width: 100%;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .modal-close h4 {
    padding-left: 15px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .col-md-12 {
    padding: 0px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header {
    width: 100%;
    height: 280px;
    text-align: center;
    overflow: inherit;
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center;
    border-bottom: 5px solid gray;
    filter:grayscale(100%);
    -webkit-filter:grayscale(100%);
    -moz-filter:grayscale(100%);
    -webkit-transition:all 0.3s ease;
    -moz-transition:all 0.3s ease;
    -o-transition:all 0.3s ease;
    -ms-transition:all 0.3s ease;
    transition:all 0.3s ease;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header:hover {
    filter:grayscale(0%);
    -webkit-filter:grayscale(0%);
    -moz-filter:grayscale(0%);
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .profile-image-container {
    margin-top: 211px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .profile-image-container img {
    border:5px solid gray;
    border-radius: 60%;
    -moz-border-radius: 60%;
    -webkit-border-radius: 60%;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info {
    width: 100%;
    position: absolute;
    margin-top: 120px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-name {
    font-weight: bold;
    color: #fff;
    font-size: 30px;
    text-align:center;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-skills ul {
    list-style: none;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-skills ul li {
    display: block;
    width: 60px;
}

.page-people-directory .modal-pull-right .modal-dialog .dialog-close {
    width: 100%;
    position: absolute;
    margin-top: 20px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li {
    cursor: pointer;
    color: white;
    text-align: right;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li span.fa {
    font-size: 35px;
    font-weight: bold;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li span.fa:hover {
    color: gray;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-view-content .contact-view-action {
    margin-right: 15px;
    margin-top: 15px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-view-content .contact-view-info {
    margin-top: 15px;
}

.page-people-directory .contact-info-container {
    height: 250px;
    margin-top: 80px;
    position: absolute;
    width: 100%;
}   

.page-people-directory .contact-add-content {
    padding: 40px;
}

.page-people-directory .close-right-modal {
    cursor: pointer;
}

.page-people-directory .close-right-modal:hover {
    opacity: .8;
}

.page-people-directory .basic-info-scroll {
    height: 425px;
    overflow-x: hidden;
}


@media (max-width: 800px) {
    .page-people-directory .contact-top-bar {
        text-align: left;
        width: 100%;
    }

    .page-people-directory .contact-top-bar .btn-add-new-contact {
        margin-bottom: 10px;
        display: block;
    }

    .page-people-directory .contact-top-bar .txt-search-contact {
        margin-bottom: -5px;
    }
}



</style>

<script type="text/javascript">




</script>
</body>
</html>