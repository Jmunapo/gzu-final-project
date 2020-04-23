import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-read-news',
  templateUrl: 'read-news.html',
})
export class ReadNewsPage {

  post = {};

  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.post = this.navParams.data;
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ReadNewsPage');
  }

}
