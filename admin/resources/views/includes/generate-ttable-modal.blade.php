<div class="modal fade generate-ttable-modal" data-backdrop="static" id="generate-ttable-modal" tabindex="-1" role="dialog" aria-labelledby="generateTTable" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box modal-card-box">
                <div class="card-head">
                  <header>Exam dates range<p id="_error_text" style="color:#da2462;"></p></header>
                  <button data-dismiss="modal" aria-label="Close"
                    class="mdl-close mdl-button mdl-js-button mdl-button--icon pull-right"
                    data-upgraded=",MaterialButton">
                    <i class="material-icons">close</i>
                  </button>
                  <i class="load-done material-icons pull-right text-success mdl-spiner-active">done</i>
                  <div class="mdl-load mdl-spiner-active  pull-right mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                </div>
                <div class="card-body row">
                  <input class="hidden" id="timetable_route" value="{{ route('generate_ttable') }}">
                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input date" type="text" id="start_date">
                      <label class="mdl-textfield__label" for="start_date">Exams starts on</label>
                    </div>
                  </div>

                  <div class="col-lg-6 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input date" min="2020" type="text" id="end_date">
                      <label class="mdl-textfield__label" for="end_date">Exams ends on</label>
                    </div>
                  </div>

                  <div class="col-lg-12 p-t-20 text-center">
                    <button type="button" id="generate_ttable"
                      class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Generate</button>
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

