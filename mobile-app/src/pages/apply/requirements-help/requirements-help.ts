import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-requirements-help',
  templateUrl: 'requirements-help.html',
})
export class RequirementsHelpPage {

  doc: any;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    console.log(this.navParams)
    this.doc = this.navParams.data;

    if (!this.doc) {
      this.doc = {}
    }
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad RequirementsHelpPage');
  }

}
