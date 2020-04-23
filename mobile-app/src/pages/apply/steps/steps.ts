import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';


@IonicPage()
@Component({
  selector: 'page-steps',
  templateUrl: 'steps.html',
})
export class StepsPage {

  requirements: Array<any> = [
    {
      name: 'National ID & Birth Certificate',
      descr: 'One Document/Pdf file with copy of National ID and Birth certificate attached',
      icon: {
        lib: 'lineicons',
        name: 'lni-licencse'
      }
    },
    {
      name: 'Academic Certificates & Employment History',
      descr: 'One Document/Pdf file with copies of all your academic certificates and employment proof',
      icon: {
        lib: 'lineicons',
        name: 'lni-graduation'
      }
    },
  ]

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }


  beginApply() {
    this.navCtrl.push('StepsTabsPage');
  }

}
