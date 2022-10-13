<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>

<div>
        <h2>Category</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <!-- <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Users</a></li> -->
        <li class="breadcrumb-item">Create</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

        <?php $validation = \Config\Services::validation(); ?>

            <div class="tile shadow">
                <form action="<?php echo base_url(); ?>/public/category/store" method="post">
    
                    <div class="form-group">
                        <label>Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" autofocus class="form-control" required>
                         <!-- Error -->
                        <?php if($validation->getError('name')) {?>
                            <div class='alert alert-danger mt-2'>
                            <?= $error = $validation->getError('name'); ?>
                            </div>
                        <?php }?>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Create</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>
