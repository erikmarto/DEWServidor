<!-- source https://bootsnipp.com/snippets/featured/advanced-dropdown-search -->
<div class="input-group" id="adv-search">
    <form class="form-horizontal input-group searchbar-form" role="form" method="post" action="?r=blog/search">
        <input type="text" class="form-control" placeholder="Entrada contiene..." name="search[texto]" />
        <div class="input-group-btn">
            <div class="btn-group" role="group">
                <div class="dropdown dropdown-lg">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></button>
                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <div class="form-group">
                            <label for="filter">Categoría</label>
                            <select class="form-control" name="search[categorias_id]">
                                <option value='-1' selected>Todas las categorías</option>
                                <?php
                                    foreach(categorias::findAll() as $categoria) {
                                        echo "<option value='$categoria->id'>$categoria->descripcion</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contain">Autor</label>
                            <input class="form-control" type="text" name="search[nombre]"/>
                        </div>
                        <div class="form-group">
                            <label for="contain">Título</label>
                            <input class="form-control" type="text" name="search[titulo]"/>
                        </div>
                    </div>
                </div>
                <button type="submit" class="search-btn btn btn-primary"><span class="search-icon" aria-hidden="true"></span></button>
            </div>
        </div>
    </form>
</div>