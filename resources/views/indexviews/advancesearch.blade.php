<div class="row" id="advancesearch">

  <div class="col l10 s10 offset-s1 offset-l1">
      <div class="searchbox row">
          <div class="row searchbox-header center-align">
              Busqueda Avanzada
          </div>
          <div class="row searchbox-body">
            <div class="col s10 offset-s1">
              <div class="input-field col s10 offset-s1">
                <input id="isbn" type="text" class="validate" placeholder="ISBN">
                <label for="isbn">ISBN</label>
              </div>
              <div class="input-field col s10 offset-s1">
                <input id="titulo" type="text" class="validate" placeholder="Titulo">
                <label for="titulo">Titulo</label>
              </div>
              <div class="input-field col s10 offset-s1">
                <input id="Autor" type="text" class="validate" placeholder="Autor">
                <label for="Autor">Autor</label>
              </div>
              <div class="input-field col s10 offset-s1">
                <div class="chips chips-placeholder"></div>
              </div>
              <div class="col s10 offset-s1">
              <p>Solo Resultados con todos los tags</p>
              <div class="switch">                
                <label>
                  No
                  <input type="checkbox">
                  <span class="lever"></span>
                  Si
                </label>
              </div>
              </div>              
            </div>
            <div class="col s10 offset-s1 line"></div>
            <div class="col s10 offset-s1">
              <div class="input-field col s10 offset-s1">
                <input id="Editora" type="text" class="validate" placeholder="Editora">
                <label for="Editora">Editora</label>
              </div>
              <div class="input-field col s10 offset-s1">
                <input id="No Edicion" type="text" class="validate" placeholder="No. Edicion">
                <label for="No Edicion">No. Edicion</label>
              </div>
              <div class="col s10 offset-s1">
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateFrom">
                    <label for="DateFrom">Desde Fecha Edicion</label>
                  </div>
                  <div class="input-field col s6">
                    <input type="date" class="datepicker" id="DateTo">
                    <label for="DateTo">Hasta Fecha Edicion</label>
                  </div>
              </div>
              <div class="col s10 offset-s1">
                  <div class="input-field col s6">
                    <input id="Precio desde" type="number" class="validate" placeholder="Precio desde">
                    <label for="Precio desde">Precio desde</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="Precio hasta" type="number" class="validate" placeholder="Precio hasta">
                    <label for="Precio hasta">Precio hasta</label>
                  </div>
              </div>  
            </div>
            <div class="col s10 offset-s1 line"></div>
            <div class="col s10 offset-s1">
                <div class="input-field col s10 offset-s1">
                  <select>
                    <option value="" disabled selected>Organizar por ... </option>
                    <option value="1">Precio (Mas bajos primero)</option>
                    <option value="1">Precio (Mas altos primero)</option>
                    <option value="1">Autor (A-Z)</option>
                    <option value="1">Autor (Z-A)</option>
                    <option value="1">Titulo (A-Z)</option>
                    <option value="1">Titulo (Z-A)</option>
                    <option value="2">Mas votados primero</option>
                    <option value="3">Aniadidos recientemente</option>
                  </select>
                  <label>Organizar por ...</label>
                </div>
                <div class="col s10 offset-s1">
                  <button class="btn-large waves-effect waves-light" style="width: 100%;">Buscar</button>
                </div>
            </div>
          </div>
      </div>
  </div>

</div>
