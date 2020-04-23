<div class="modal fade add-venue-modal" data-backdrop="static" id="add-venue-modal" tabindex="-1" role="dialog" aria-labelledby="addVenueModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="row">
            <div class="col-sm-12">
              <div class="card-box modal-card-box">
                <div class="card-head">
                  <header>Add Venue <p id="error_text" style="color:#da2462;"></p></header>
                  <button data-dismiss="modal" aria-label="Close"
                    class="mdl-close mdl-button mdl-js-button mdl-button--icon pull-right"
                    data-upgraded=",MaterialButton">
                    <i class="material-icons">close</i>
                  </button>
                  <i class="load-done material-icons pull-right text-success mdl-spiner-active">done</i>
                  <div class="mdl-load mdl-spiner-active  pull-right mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
                </div>
                <div class="card-body row">
                  <input type="hidden" id="venue_route" value="{{ route('add_venues') }}">
                  <div class="col-lg-4 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="text" id="venue_name">
                      <label class="mdl-textfield__label" for="venue_name">Venue Name:</label>
                    </div>
                  </div>
                  <div class="col-lg-4 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="text" id="venue_key">
                      <label class="mdl-textfield__label" for="venue_key">Venue Key:</label>
                    </div>
                  </div>
                  <div class="col-lg-4 p-t-20">
                    <div
                      class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                      <input class="mdl-textfield__input" type="number" id="capacity">
                      <label class="mdl-textfield__label" for="capacity">Capacity:</label>
                    </div>
                  </div>
                  <div class="col-lg-12 p-t-20 text-center">
                    <button type="button" id="submit_venue"
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

