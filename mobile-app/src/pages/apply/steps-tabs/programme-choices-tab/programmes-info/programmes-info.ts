import { Component } from '@angular/core';
import { IonicPage, NavParams, ViewController } from 'ionic-angular';


@IonicPage()
@Component({
  selector: 'page-programmes-info',
  templateUrl: 'programmes-info.html',
})
export class ProgrammesInfoPage {

  prog: any = {};
  constructor(public viewCtrl: ViewController, private navParams: NavParams) {
    this.prog = this.navParams.data;
  }

  close() {
    this.viewCtrl.dismiss();
  }

  ionViewDidLoad() {
    console.log(this.prog);
  }

}
