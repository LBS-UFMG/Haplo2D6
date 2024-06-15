<footer class=" bg-dark text-light py-5 ">
    <div class="row px-4">
        <div class="col-2"><a href="#">
            <img src="<?= filtra_url(base_url('/img/1.png')) ?>" style="height:100px">
        </a></div>
        <div class="col-2"> <a href="#">
            <img src="<?= filtra_url(base_url('/img/3.png')) ?>" style="height:100px">
          </a></div>

      
  
        <div class="col-2"><a href="#">
            <img src="<?= filtra_url(base_url('/img/dcc_w.svg')) ?>" style="height:90px">
          </a></div>
        <div class="col-2"><a href="#">
              <img src="<?= filtra_url(base_url('/img/ufmg_w.svg')) ?>" style="height:85px">
          </a></div>

          <div class="col-2 ps-5 ms-5"><a href="#">
            <img src="<?= filtra_url(base_url('/img/2.png')) ?>" style="height:100px">
          </a></div>

      </div>
    </div>

    <div class="px-4 d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top text-secondary">
      <p class="px-4">© 2022-<?=date('Y')?> | Haplelo v0.3 - Developed by <a href="#" data-bs-toggle="modal" data-bs-target="#about" class="link-light">LBS-UFMG</a>.</p>
      <ul class="list-unstyled d-flex">
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
        <li class="ms-3"><a class="link-body-emphasis" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
      </ul>
    </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
  integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
  integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>

  <!-- Lista de modals -->
  <?= $this->include('modal/autores') ?>
  <!-- fim / Lista de modals -->

  <?= $this->renderSection('scripts') ?> 
  <!-- FIM Scripts -->

</footer>
</body>
</html>