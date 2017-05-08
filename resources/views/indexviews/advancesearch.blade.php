<div class="row" id="advancesearch">

  <div class="col l10 s12 offset-l1" style="padding: 0;">
      <div class="searchbox row">
          <div class="row searchbox-header center-align">
              Busqueda Avanzada
          </div>
          <form method="get" action="{{url('/findBooks')}}" id="advancesearch-form">
          <div class="row searchbox-body">
            <div class="col s12 l10 offset-l1">
              <div class="input-field col s12 l10 offset-l1">
                <input id="isbn" type="text" class="validate" placeholder="ISBN" name="isbn">
                <label for="isbn">ISBN</label>
              </div>
              <div class="input-field col s12 l10 offset-l1">
                <input id="titulo" type="text" class="validate" placeholder="Titulo" name="title">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col s12 l10 offset-l1">
                <input id="Autor" type="text" class="validate" placeholder="Autor" name="autor">
                <label for="Autor">Autor</label>
              </div>
              <div class="input-field col s12 l10 offset-l1">
                <div class="chips chips-placeholder" id="chips-div"></div>
              </div>
              <!--<div class="col s10 offset-s1">
              <p>Solo Resultados con todos los tags</p>
              <div class="switch">                
                <label>
                  No
                  <input type="checkbox" id="busqueda-tags">
                  <span class="lever"></span>
                  Si
                </label>
              </div>
              </div> -->             
            </div>
            <div class="col l10 s12 offset-l1 line"></div>
            <div class="col s12 l10 offset-l1">
              <div class="input-field col s12 l10 offset-l1">
                <input id="Editora" type="text" class="validate" placeholder="Editora" name="editora">
                <label for="Editora">Editora</label>
              </div>
              <div class="input-field col s12 l10 offset-l1">
                <input id="No Edicion" type="text" class="validate" placeholder="No. Edicion" name="noedicion">
                <label for="No Edicion">No. Edicion</label>
              </div>
              <div class="col s12 l10 offset-l1" style="padding: 0;">
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateFrom" name="dateeditionfrom">
                    <label for="DateFrom">Desde Fecha Edicion</label>
                  </div>
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateTo" name="dateeditionto">
                    <label for="DateTo">Hasta Fecha Edicion</label>
                  </div>
              </div>
              <div class="col s12 l10 offset-l1" style="padding: 0;">
                  <div class="input-field col s6">
                    <input id="Precio desde" type="number" class="validate" placeholder="Precio desde" name="preciodesde">
                    <label for="Precio desde">Precio desde</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="Precio hasta" type="number" class="validate" placeholder="Precio hasta" name="preciohasta">
                    <label for="Precio hasta">Precio hasta</label>
                  </div>
              </div>  
            </div>
            <div class="col l10 s12 offset-l1 line"></div>
            <div class="col s12 l10 offset-l1">
                <div class="input-field col s12 l10 offset-l1">
                  <select name="organizarpor">
                    <option value="null" disabled selected>Organizar por ... </option>
                    <option value="preciobajo">Precio (Mas bajos primero)</option>
                    <option value="precioalto">Precio (Mas altos primero)</option>
                    <option value="autoraz">Autor (A-Z)</option>
                    <option value="autorza">Autor (Z-A)</option>
                    <option value="tituloaz">Titulo (A-Z)</option>
                    <option value="tituloza">Titulo (Z-A)</option>
                   <!-- <option value="2">Mas votados primero</option>-->
                    <option value="recientes">Aniadidos recientemente</option>
                  </select>
                  <label>Organizar por ...</label>
                </div>
                <div class="col s12 l10 offset-l1">
                  <button class="btn-large waves-effect waves-light" style="width: 100%;" id="btn_buscar">Buscar</button>
                </div>
            </div>
          </div>
          <input type="hidden" name="tipodebusqueda" value="avanzada">
          </form>
      </div>
  </div>

</div>
