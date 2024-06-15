<?php helper('App\Helpers\filtra_url'); ?>

<!-- MODAL: SOBRE -->
<div class="modal fade" tabindex="-1" id="about" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <div class="text-center">
          <img width="150" class="me-3" src="<?php echo filtra_url(base_url('/img/logo_v5.svg')); ?>">
          
        </div>
        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body small">
        <div class="row">
          <div class="col-md-6">

          <?php 
            $autores = fopen('../AUTHORS.md', 'r'); 
            $cont = 0;
            while(!feof($autores)) {
              $linha = fgets($autores);

              if(substr($linha, 0, 1) == '#'){  // subtítulo
                echo '<strong>'.substr($linha, 2).'</strong><br>';
              }
              elseif(count(explode(' | ', $linha)) > 1){  // autor com link
                if(substr($linha, 0, 2) != '//'){
                  $autor = explode(' | ', $linha);
                  echo '<a href="'.$autor[1].'" target="_blank">'.$autor[0].'</a><br>';
                }
              }
              else{  // autor
                $autor = $linha;
                if(substr($linha, 0, 2) != '//'){
                  echo $autor.'<br>';
                }
              } 
              $cont++; if($cont == 100){ break; } // impede que mais do que 100 linhas sejam exibidas

            } ?>
          </div>
          <div class="col-6">
            <h5>Update log</h5>
            <ul class="small">
              <?php 
              $autores = fopen('../VERSION.md', 'r'); 
              $cont = 0;
              while(!feof($autores)) {
                $linha = fgets($autores);
                if(substr($linha, 0, 2) != '//' and substr($linha, 0, 2) != ''){
                  echo '<li>'.$linha.'</li>';
                }
                $cont++; if($cont == 100){ break; } // impede que mais do que 100 linhas sejam exibidas

              } ?>
            </ul>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <img height="50" class="me-3" src="<?php echo filtra_url(base_url('/img/dcc_b.svg')); ?>">
        <img height="50"  class="me-3" src="<?php echo filtra_url(base_url('/img/ufmg_b.svg')); ?>">

        <button type="button" class="btn btn-primary py-4 px-5" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal SOBRE -->