import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AuthProvider } from '../../../providers/auth/auth';

@IonicPage()
@Component({
  selector: 'page-profile',
  templateUrl: 'profile.html',
})
export class ProfilePage {

  profile: any = {};
  loaded: boolean = false;

  constructor(public navCtrl: NavController,
    public auth: AuthProvider,
    public navParams: NavParams) {
  }

  ionViewDidLoad() {
    const token = this.navParams.data;
    this.auth.getProfile(token).subscribe((profile: any) => {
      if (profile && profile.firstname) {
        this.profile = profile;
        console.log(this.profile);
        this.loaded = true;
      }
    }, e => {
      console.log(e);
    })
  }

  openPage(page) {
    this.navCtrl.push(page, this.profile);
  }

}
