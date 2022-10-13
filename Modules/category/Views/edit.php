<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>

<div>
        <h2>Category</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?= base_url('public/category/update/'.$category['id']) ?>" method="post">
                
    
                    <div class="form-group">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" value="<?= old('name',$category['name']) ?>" required>
                         <!-- Error -->

                    </div>


                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>
