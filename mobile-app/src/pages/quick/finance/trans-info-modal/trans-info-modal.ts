import { Component } from '@angular/core';
import { NavController, NavParams, ViewController } from 'ionic-angular';


@Component({
  selector: 'page-trans-info-modal',
  templateUrl: 'trans-info-modal.html',
})
export class TransInfoModalPage {

  transaction: any = {};

  constructor(public navCtrl: NavController,
    public viewCtrl: ViewController,
    public navParams: NavParams) {
    this.transaction = this.navParams.data;
    console.log(this.transaction);
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad TransInfoModalPage');
  }

  share() {
    this.viewCtrl.dismiss(this.transaction);
  }

}
