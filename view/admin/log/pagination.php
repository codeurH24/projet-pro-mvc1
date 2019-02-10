<div class="row  justify-content-center">
  <div class="col-12">
    <ul class="pagination ">
    <li class="page-item">
      <a class="page-link  back-page" href="/<?= $page ?>1" aria-label="Previous">
        <span aria-hidden="true"><i class="far fa-2x fa-arrow-alt-circle-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
    <?php for($i=1; $i< $numberSplits+1; $i++  ) { ?>
    <li class="page-item"><a class="page-link" href="<?= $page.$i ?>"><?= $i ?></a></li>
    <?php } ?>
    <li class="page-item">
      <a class="page-link next-page" href="/<?= $page.$numberSplits ?>" aria-label="Next">
        <span aria-hidden="true"><i class="far fa-2x fa-arrow-alt-circle-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>
  </ul>
  </div>
</div>
