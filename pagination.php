<?php // if we have more then 10 records then only we need show pagination?>
<?php if($data['totalRecords'] > 10): ?>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
                    <?php for($i=1; $i<=$data['numberOfPages']; $i++) { ?>

                        <li class="page-item <?php echo $i == $data['page'] ? 'active' : ''; ?>"><a class="page-link" href="student_list.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                    <?php } ?>
                    <!--                    <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>