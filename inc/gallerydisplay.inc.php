<div class="container-fluid" id="gallery">
        <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h1><?= $_SESSION['username']?>'s Image Gallery</h1>
                            <label class="control-label"></label>
                            <div class="preview-zone hidden">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <div><b>Image Preview</b></div>
                                        <div class="box-tools pull-right">
                                            <button type="button" class="btn btn-danger btn-xs remove-preview override">
                                                <i class="fa fa-times"></i> Clear Image
                                            </button>
                                        </div>
                                    </div>
                                    <div class="box-body"></div>
                                </div>
                            </div>
                            <div class="dropzone-wrapper">
                                <div class="dropzone-desc">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <p>Drag an Image here to preview!</p>
                                </div>
                                <input type="file" name="file_upload" class="dropzone">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right override">Upload</button>
                        <?php
                        if (!empty($message)) {
                            echo "<p id=\"alert\" class=\"alert alert-primary mt-4\">{$message}</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </form>

        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap flex-row align-items-center justify-content-between">
                    <?php 
                    require 'inc/functions.inc.php';
                    display_images(); ?>
                </div>
            </div>
        </div>
    </div>