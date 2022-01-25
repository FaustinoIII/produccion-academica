<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
<section class="border p-2 mb-4 d-flex align-items-center flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Collapsible wrapper -->
        <div class="form-group">
          <label class="control-label" for="id_almacen">Buscar por: </label>
          <select id="busquedaClasificacion" name= "id_almacen" class="form-select">
            <option selected>seleccione</option>
            <option>Titulo del articulo</option>
            <option>Autor</option>
            <option>Revista</option>
            <option>Tipo de articulo</option>
          </select>
        </div>
        <!-- Left links -->

        <!-- Search form -->
        <div class="input-group ps-5">
          <div id="navbar-search-autocomplete" class="form-outline">
            <input type="search" id="form1" class="form-control" />
          </div>
          <button type="button" class="btn btn-primary">
            Buscar
          </button>
        </div>
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </section>