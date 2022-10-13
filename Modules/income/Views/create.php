<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>

<div>
        <h2>Incomes</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">Create</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

        <?php $validation = \Config\Services::validation(); ?>

            <div class="tile shadow">
                <form action="<?php echo base_url(); ?>/public/incomes/store" method="post">
    
                    <div class="form-group">
                        
                        <label>Notes <span class="text-danger">*</span></label>

                        <textarea   name="notes"  class="form-control"></textarea>
                        <br>
                        <label>Category <span class="text-danger">*</span></label>

                        <select class="form-control" name="cat_id">
                               <option>Choose Category</option> 
                            <?php foreach ($categories as  $cat) {
                            ?>
                                <option value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>

                            <?php
                            } ?>
                        </select>
                        <br>
                        <label>Amount <span class="text-danger">*</span></label>

                        <input type="text" name="amount" autofocus class="form-control" required>
                        <br>
                        <label>Date <span class="text-danger">*</span></label>

                        <input type="date" name="date" autofocus class="form-control" required>
    
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
