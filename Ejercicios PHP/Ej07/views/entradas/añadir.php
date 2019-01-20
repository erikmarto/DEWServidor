
<form method="post" action="?r=Entrada/create">
  <div class="form-row">
    
    <div class="form-group col-md-12">
        <label for="exampleFormControlTextarea1">Texto : </label>
        <textarea required class="form-control" name="entrada[texto]" rows="4" placeholder="Entrada..."></textarea>
    </div>
    <div class="form-group col-md-6">
      <label>Categoria</label>
      <select required class="form-control" name="entrada[categorias_id]">
        <option value="" selected disabled hidden>Elige categoria...</option>
        <?php
          foreach($categorias as $cat){
            echo "<option value='$cat->id'>$cat->descripcion</option>"; 
          }
        ?>
      </select>
      <input type="hidden" name="entrada[usuarios_id]" value="<?=app::instance()->user->id?>">
    </div>
  </div>
  <button class="btn btn-dark" type="submit">Añadir</button>
</form>