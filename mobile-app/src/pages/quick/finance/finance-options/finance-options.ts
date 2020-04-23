import { Component } from '@angular/core';
import { NavController, NavParams, ViewController } from 'ionic-angular';


@Component({
  selector: 'page-finance-options',
  templateUrl: 'finance-options.html',
})
export class FinanceOptionsPage {

  action: string = 'Deposit';
  account: string;

  constructor(public navCtrl: NavController,
    public viewCtrl: ViewController,
    public navParams: NavParams) {
    let data = this.navParams.data;
    if (data && data.action) {
      let name = data.action.toLowerCase();
      this.account = name;
      this.action = (name === 'student wallet') ? 'Top up wallet' : 'Deposit ' + name + ' fee';
    }
  }

}
