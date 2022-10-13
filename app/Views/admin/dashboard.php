<?php $this->extend('Admin\Layouts\app') ?>

<?= $this->section('content') ?>
    <div>
        <h2>Reoprts</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <!-- <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item">Users</li> -->
    </ul>



    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row mb-2">


                </div><!-- end of row -->


                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table style="width: 100%;">
                                <thead>
                                <tr>
 
                                    <th>Category Name</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php 
                                    // var_dump(array_column($reports,'amount'));
                                $total = []; 
                                foreach ($reports as $report) {
                                  array_push( $total ,$report->amount)  
                             ?>
                         <tr>

                            <td><?php echo $report->name; ?></td>
                            <td><?php echo $report->amount; ?></td>

                            </tr>

                             <?php
                                }
                                
                            ?>
                            <td style="text-align:center" >Total Amount : <?php echo array_sum($total); ?></td>


                    </tbody>
                
                </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->
    <?= $this->endSection() ?>