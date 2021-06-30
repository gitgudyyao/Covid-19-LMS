<?php require_once('include/header.php') ?>

<div class="row">
    <!--WIDGETBOX Main Box-->
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Book List :</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>BookName</th>
                            <th>Book Image</th>
                            <th>Publication Name</th>
                            <th>Author Name</th>
                            <th>Purchase Date</th>
                            <th>Book Quantity</th>
                            <th>Available Quantity</th>

                        </tr>
                        </thead>
                        <tbody
                            <?php
                                $results = mysqli_query($con,"SELECT * FROM books");
                                while ($row = mysqli_fetch_assoc($results)){ ?>
                                    <tr id="book<?= $row['id']?>">
                                        <td><?= $row['book_name']?></td>
                                        <td><img src="../serverimages/<?= $row['book_image']?>" alt="<?= $row['book_image']?>" width="80" height="80"></td>
                                        <td><?= $row['book_publicationname']?></td>
                                        <td><?= $row['book_authorname']?></td>
                                        <td><?= date("d-M-Y", strtotime($row['book_purchase_date'])) ?></td>
                                        <td><?= $row['book_qty']?></td>
                                        <td><?= $row['avaible_qty']?></td>

                                    </tr>

                            <?php     }
                            ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>










</div>


<?php require_once('include/footer.php') ?>

