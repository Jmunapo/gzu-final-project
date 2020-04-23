import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { timer } from 'rxjs/observable/timer';

@IonicPage()
@Component({
  selector: 'page-results',
  templateUrl: 'results.html',
})
export class ResultsPage {

  fill: string = "#1a237e";
  loaded: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ResultsPage');
    timer(1895).subscribe(() => this.loaded = true);
  }

}
