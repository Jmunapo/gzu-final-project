import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@IonicPage()
@Component({
  selector: 'page-refrees-tab',
  templateUrl: 'refrees-tab.html',
})
export class RefreesTabPage {
  refreeDetails: FormGroup;

  constructor(public navCtrl: NavController, public navParams: NavParams,
    private formBuilder: FormBuilder, private events: Events) {
    this.refreeDetails = this.formBuilder.group({
      refree_one_name: ['', Validators.required],
      refree_one_address: ['', Validators.required],
      refree_one_phone: ['', Validators.required],
      refree_two_name: ['', Validators.required],
      refree_two_address: ['', Validators.required],
      refree_two_phone: ['', Validators.required],
    });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad RefreesTabPage');
  }

  submit(val: any): void {
    let data = {
      key: 'refrees',
      val
    }
    this.events.publish('form:next', data);
  }

}
