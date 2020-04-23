import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

@IonicPage()
@Component({
  selector: 'page-contact-details-tab',
  templateUrl: 'contact-details-tab.html',
})
export class ContactDetailsTabPage {

  contactDetails: FormGroup;

  constructor(public navCtrl: NavController, public navParams: NavParams,
    private events: Events, private formBuilder: FormBuilder) {
    this.contactDetails = this.formBuilder.group({
      address: ['', Validators.required],
      phone: ['', Validators.required],
      email: ['', Validators.required],
      next_of_kin_name: ['', Validators.required],
      relationship: ['', Validators.required],
      next_of_kin_address: ['', Validators.required],
      next_of_kin_phone: ['', Validators.required],
    });
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ContactDetailsTabPage');
  }

  submit(val: any): void {

    let data = {
      key: 'contact_details',
      val
    }

    this.events.publish('form:next', data);

  }

}
