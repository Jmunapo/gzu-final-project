<div class="modal fade add-carriculum-modal" data-backdrop="static" id="add-carriculum-modal" tabindex="-1" role="dialog" aria-labelledby="addCarriculaModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box modal-card-box">
                <div class="card-head">
                  <header>Add Carriculum <p id="error_text" style="color:#da2462;"></p></header>
                  <button data-dismiss="modal" aria-label="Close"
                    class="mdl-close mdl-button mdl-js-button mdl-button--icon pull-right"
                    data-upgraded=",MaterialButton">
                    <i class="material-icons">close</i>
                  </button>
                  <i class="load-done material-icons pull-right text-success mdl-spiner-active">done</i>
                  <div class="mdl-load mdl-spiner-active  pull-right mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                </div>
                <div class="card-body row">
                  <input type="hidden" id="cur_route" value="{{ route('save_curriculum') }}">
                  <input type="hidden" id="programme_id" value="{{ request()->id }}">
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="text" id="curricular_name">
                      <label class="mdl-textfield__label" for="curricular_name">Carriculum Name:</label>
                    </div>
                  </div>

                  <div class="col-lg-6 p-t-20">
                      <div 
                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
                        <input class="mdl-textfield__input add-new-val" type="text" id="effect_from" value="" readonly tabIndex="-1">
                        <label for="effect_from" class="pull-right margin-0">
                          <i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
                        </label>
                        <label for="effect_from" class="mdl-textfield__label">Effect From</label>
                        <ul data-mdl-for="effect_from" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
      
                            
                              <li class="mdl-menu__item" data-val="Aug-2019">Aug-2019</li>
                              <li class="mdl-menu__item" data-val="March-2020">March-2020</li>
                              <li class="mdl-menu__item" data-val="Aug-2020">Aug-2020</li>
                           
                        </ul>
                      </div>
                    </div>

                  <div class="col-lg-12 p-t-20 text-center">
                    <button type="button" id="submit_carricular"
                      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
                    <button type="button" data-dismiss="modal"
                      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

