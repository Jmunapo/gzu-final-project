import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { AuthProvider } from '../../../providers/auth/auth';
import { Storage } from '@ionic/storage';
import { GlobalFuncsProvider } from '../../../providers/global-funcs/global-funcs';


@IonicPage()
@Component({
  selector: 'page-login',
  templateUrl: 'login.html',
})
export class LoginPage {

  @ViewChild('regNumber') regNumber;
  @ViewChild('pass') pass;

  focused: boolean = false;
  reg_number_inv: boolean = false;
  password_inv: boolean = false;

  private loginForm: FormGroup;

  constructor(public navCtrl: NavController,
    private auth: AuthProvider,
    public storage: Storage,
    private _gf: GlobalFuncsProvider,
    public navParams: NavParams, private formBuilder: FormBuilder) {
    this.loginForm = this.formBuilder.group({
      reg_number: ['', [Validators.required, Validators.pattern(/^[A-Za-z]{1}[0-9]{6,}/)]],
      password: ['', Validators.required]
    });
  }

  ionViewDidLoad() {

  }
  setFocus() {
    console.log('ionViewDidLoad LoginPage');
  }

  submit(val) {
    const controls = ['reg_number', 'password'];
    let valid = true;
    controls.forEach(c => {
      if (!this.loginForm.controls[c].valid) {
        valid = false;
        this[`${c}_inv`] = true;
        setTimeout(() => {
          this[`${c}_inv`] = false;
        }, 1000)
      }
    });
    if (valid) {

      this._gf.showLoading('Please wait..', 25000, () => "");

      this.auth.login(val).subscribe((logged: any) => {
        if (logged.access_token) {
          this.auth.userDetails(logged.access_token).subscribe((user: any) => {
            user.access_token = logged.access_token;
            this.storage.set('USER', user).then(() => {
              this.auth.authState.next(user);
              this._gf.loaded = true;
              this._gf.destroyLoader();
            })
          },
            e => {
              console.log(e);
              this._gf.loaded = true;
              this._gf.destroyLoader();
              if (e.statusText === "Unauthorized" || e.statusText === "Internal Server Error") {
                return this._gf.showToster('Something went wrong, try again.', 'error-toaster');
              }

              return this._gf.showToster('Error, check your internet connection.', 'error-toaster');
            })
        }
      }, e => {
        console.log(e);
        this._gf.loaded = true;
        this._gf.destroyLoader();
        if (e.error && e.error.error && e.error.error === 'Invalid Credentials') {
          this.loginForm.patchValue({
            password: ''
          });
          return this._gf.showToster('Invalid credentials, try again.', 'error-toaster');
        }
        if (e.statusText === "Unauthorized") {
          this.loginForm.patchValue({
            password: ''
          });
          return this._gf.showToster('Invalid credentials, try again.', 'error-toaster');
        }

        if (e.statusText === "could_not_create_token") {
          return this._gf.showToster('Something went wrong, try again.', 'error-toaster');
        }
        if (e.statusText === 'Unknown Error') {
          return this._gf.showToster('Error, check your internet connection.', 'error-toaster');
        }
        return this._gf.showToster('Error!, try again. If persist contact admin.', 'error-toaster');
      })
    }

  }

  goToApply() {
    this.navCtrl.push('StepsPage');
  }

}
