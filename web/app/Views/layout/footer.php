<footer>
  <hr class="mb-1">
  <p class="small text-muted text-center me-2 mb-0">© 2022-<?=date('Y')?> | Haplelo v0.2 - Developed by <a href="#" data-bs-toggle="modal" data-bs-target="#about" class="link-dark">LBS-UFMG</a>.</p>

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