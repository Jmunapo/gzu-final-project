<div class="modal fade add-school-modal" data-backdrop="static" id="add-school-modal" tabindex="-1" role="dialog" aria-labelledby="addSchoolModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box modal-card-box">
                <div class="card-head">
                  <header>Add School <p id="error_text" style="color:#da2462;"></p></header>
                  <button data-dismiss="modal" aria-label="Close"
                    class="mdl-close mdl-button mdl-js-button mdl-button--icon pull-right"
                    data-upgraded=",MaterialButton">
                    <i class="material-icons">close</i>
                  </button>
                  <i class="load-done material-icons pull-right text-success mdl-spiner-active">done</i>
                  <div class="mdl-load mdl-spiner-active  pull-right mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                </div>
                <div class="card-body row">
                  <input type="hidden" id="route" value="{{ url('add_school') }}">
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="text" id="school_name">
                      <label class="mdl-textfield__label" for="school_name">School Name:</label>
                    </div>
                  </div>
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input date" type="text" id="date-2">
                      <label class="mdl-textfield__label">Start Date</label>
                    </div>
                  </div>
                  <div class="col-lg-12 p-t-20">
                    <div class="mdl-textfield mdl-js-textfield txt-full-width">
                      <textarea class="mdl-textfield__input" rows="4" id="about_school"></textarea>
                      <label class="mdl-textfield__label" for="about_school">About School</label>
                    </div>
                  </div>
                  <div class="col-lg-12 p-t-20 text-center">
                    <button type="button" id="submit_school"
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

