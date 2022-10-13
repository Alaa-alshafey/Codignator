<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>

<div>
        <h2>Incomes</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item">Edit</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">
                <form action="<?= base_url('public/incomes/update/'.$incomes['id']) ?>" method="post">
                
    
                    <div class="form-group">
                        <label>Notes <span class="text-danger">*</span></label>

                        <textarea   name="notes"  class="form-control"><?= old('notes',$incomes['notes']) ?></textarea>

                    </div>
                    <label>Category <span class="text-danger">*</span></label>

                    <select class="form-control" name="cat_id">
                        <?php foreach ($categories as  $cat) {
                        ?>
                            <option value="<?php echo $cat['id']?>"><?php echo $cat['name'] ?></option>

                        <?php
                        } ?>
                    </select>
                    <br>
                    <label>Amount <span class="text-danger">*</span></label>

                    <input type="text" name="amount" value="<?= old('notes',$incomes['amount']) ?>" autofocus class="form-control" required>
                    <br>
                    <label>Date <span class="text-danger">*</span></label>

                    <input type="date" value="<?= old('notes',$incomes['date']) ?>" name="date" autofocus class="form-control" required>



                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>
