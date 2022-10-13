<?php $this->extend('Admin\Layouts\app') ?>
    
<?= $this->section('content') ?>
    <div>
        <h2>Incomes</h2>
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

                            <a href="<?php echo base_url('public/incomes/create')  ?>" class="btn btn-primary"><i class="fa fa-plus"></i>Create</a>
                            
                    </div>

                </div><!-- end of row -->
                <form method="get" action="">

                <div class="row">

                        <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" id="data-table-search" name="search_notes" class="form-control" autofocus placeholder="search in notes">
                                </div>
                        </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" id="data-table-search" class="form-control" name="category" autofocus placeholder="search in cayegory">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="text" id="data-table-search" class="form-control" name="amount" autofocus placeholder="search in Amount">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="date" id="data-table-search" class="form-control" name="from" autofocus placeholder="search  from">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <button   type="submit"  name="submit"  class="btn btn-primary">Search</button>
                                </div>
                            </div>

     

                </div><!-- end of row -->
                </form>

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table style="width: 100%;">
                                <thead>
                                <tr>
 
                                    <th>ID</th>
                                    <th>Notes</th>
                                    <th>Category</th>
                                    <th>amount</th>
                                    <th>date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $no = 1;
                                    foreach ($incomes as $income) {
                                ?>
                            <tr>    

                                <td><?= $no++ ?></td>
                                <td><?=  $income['notes'] ?></td>
                                        <?php 
                                         $category = new \Modules\category\Models\Category; 
                                            $cat_name = $category->where('id',$income['cat_id'])->first();
                                        ?>
                                <td><?=  $cat_name['name'] ?></td>
                                <td><?=  $income['amount'] ?></td>
                                <td><?=  $income['date'] ?></td>
                                <td>
                                <a href="<?= base_url('public/incomes/edit/'.$income['id']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>edit</a>

                                <a class="btn btn-sm btn-danger" href="<?= base_url('public/incomes/delete/'.$income['id']) ?>">Delete</a>


                                </td>
                                </tr>

                                <?php
                                    }
                                ?> 
                    </tbody>
                
                </table>

                <div class="mt-3">
                <?php if ($pager) :?>
                <?php $pagi_path='projectCodignator/public/incomes'; ?>
                <?php $pager->setPath($pagi_path); ?>
                <?= $pager->links() ?>
                <?php endif ?>
            </div>
            
            </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>
