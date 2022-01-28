<!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
<section class="border p-2 mb-4 d-flex align-items-center flex-column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" >
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Collapsible wrapper -->
        <div class="form-group">
          <label class="control-label" for="id_almacen">Buscar por: </label>
          <select id="busquedaClasificacion" name= "busqueda" class="form-select">
            <option selected value='0'>seleccione</option>
            <option value = '1'>Titulo del articulo</option>
            <option value = '2'>Autor</option>
            <option value = '3'>Revista</option>
            <option value = '4'>Tipo de articulo</option>
          </select>
        </div>
        
        <form action="{{url('/busqueda/'.'1')}}" >
          <div class="input-group ps-5">
            <div id="navbar-search-autocomplete" class="form-outline">
              <input type="search" id="form1" class="form-control" />
            </div>
            <button type="submit" class="btn btn-primary">
              Buscar
            </button>
          </div>
        </form>
        <!-- Search form -->
        
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->
  </section>