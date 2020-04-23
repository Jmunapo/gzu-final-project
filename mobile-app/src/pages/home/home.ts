import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events } from 'ionic-angular';
import { AuthProvider } from '../../providers/auth/auth';
import { RemoteProvider } from '../../providers/remote/remote';
import { timer } from 'rxjs/observable/timer';

@IonicPage()
@Component({
  selector: 'page-home',
  templateUrl: 'home.html',
})
export class HomePage {

  year = new Date().getFullYear();

  tuition: any = '--';
  wallet: any = '--';
  currency: string = '$';

  token: string = '';

  constructor(public navCtrl: NavController,
    public auth: AuthProvider,
    private event: Events,
    public remote: RemoteProvider,
    public navParams: NavParams) {

  }

  ionViewWillEnter() {
    if (!this.auth.user) {
      timer(700).subscribe(() => this.ionViewWillEnter());
      return;
    }

    this.token = this.auth.user.access_token;

    this.remote.getFinancials(this.auth.user.access_token).subscribe((fin: any) => {
      if (typeof fin === 'object') {
        this.tuition = fin.fees_balance || 0;
        this.wallet = fin['Student Wallet'] || 0;
        this.currency = fin.currency || '$';
      }
      console.log(fin)
    }, e => {
      if (e.error && (e.error.error === 'Token is Expired' || e.statusText === 'Unauthorized')) {
        this.event.subscribe('login:homepage', () => {
          console.log('Logged');
          this.event.unsubscribe("homepage");
          timer(200).subscribe(() => this.ionViewWillEnter());
        })
        this.auth.enterPassword(this.auth.user, 'homepage');
      }
      console.log(e);
    })
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad HomePage');
  }

  openOption(optn) {
    console.log(optn);
  }

  openInfo() {
    console.log('Info')
    this.event.publish('feature');
  }

  p() {
    this.navCtrl.push('FinancePage', this.token);
  }

}
