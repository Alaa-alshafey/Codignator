<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>
    <div>
        <h2>Category</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <!-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Users</li> -->
    </ul>

    <?php 
// Display Response
if(session()->has('message')){
?>
   <div class="alert <?= session()->getFlashdata('alert-class') ?>">
      <?= session()->getFlashdata('message') ?>
   </div>
<?php
}
?>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">

                    <div class="col-md-12">

                            <a href="<?php echo base_url('public/category/create')  ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>

                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="search">
                        </div>
                    </div>

     

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table style="width: 100%;">
                                <thead>
                                <tr>
 
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $category['name'] ?></td>
                                <td>
                                <a href="<?= base_url('public/category/edit/'.$category['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>

                                <a class="btn btn-sm btn-danger" href="<?= base_url('public/category/delete/'.$category['id']) ?>">Delete</a>


                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                
                </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>
