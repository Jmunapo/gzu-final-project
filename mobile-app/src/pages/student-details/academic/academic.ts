import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-academic',
  templateUrl: 'academic.html',
})
export class AcademicPage {

  profile: any = {};

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {

    let prof = this.navParams.data;
    if (prof && prof.firstname) {
      this.profile = prof;
    }
    console.log('ionViewDidLoad AcademicPage');
  }

}
