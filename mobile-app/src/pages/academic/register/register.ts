import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { RemoteProvider } from '../../../providers/remote/remote';
import { GlobalFuncsProvider } from '../../../providers/global-funcs/global-funcs';
import { timer } from 'rxjs/observable/timer';

@IonicPage()
@Component({
  selector: 'page-register',
  templateUrl: 'register.html',
})
export class RegisterPage {

  fill: string = "#009900";

  loaded: boolean = false;

  has_registered: boolean = false;
  has_error: boolean = false;

  TOKEN: string;

  registeredCourses: Array<any> = [];

  curriculumCourses = [];

  constructor(public navCtrl: NavController,
    public remote: RemoteProvider,
    private _gf: GlobalFuncsProvider,
    public navParams: NavParams) {
  }

  ionViewWillLoad() {
    const token = this.navParams.data;
    this.TOKEN = token;
    if (token) {
      this.remote.getCourses(token).subscribe((courses: Array<any>) => {
        if (courses.length) {
          this.curriculumCourses = courses;
          this.registeredCourses = courses.filter(crs => crs.registered);
          this.has_registered = (this.registeredCourses.length) ? true : false;
        }
        this.loaded = true;
      }, (e) => {
        this.has_error = this.loaded = true;
      })
    } else {
      this.has_error = this.loaded = true;
    }
  }

  registerModule(ev, curr) {
    let val = ev.value;

    let msg = val ? `Registered for` : `You deregister`;
    const message = `${msg} ${curr.course_code}`;

    this._gf.showToster(message, 'info-toaster', 250);


    this.curriculumCourses.map(course => {
      if (course.course_code === curr.course_code) {
        course.registered = val;
      }
      return course;
    });
  }

  confirmRegistration() {
    this.registeredCourses = this.curriculumCourses.filter(course => {
      return course.registered;
    });
    if (!this.registeredCourses.length) {
      this._gf.showToster('No courses registered!', 'error-toaster');
      return;
    }
    this._gf.showLoading('Please wait..', 25000, () => "");

    this.remote.confirmCourseReg(this.registeredCourses, this.TOKEN).subscribe((reg: any) => {
      this._gf.loaded = true;
      this._gf.destroyLoader();
      if (!reg || !reg.message || reg.message !== 'Registered successfully') {
        this._gf.showToster('Something went wrong, please try again!', 'error-toaster');
        return 0;
      }
      this._gf.showToster(`${this.registeredCourses.length} module${(this.registeredCourses.length === 1) ? '' : 's'} successfully registered`, 'success-toaster');
      this.has_registered = true;
    }, error => {
      this._gf.loaded = true;
      this._gf.destroyLoader();
      this._gf.showToster('Error 0xError114, contact admin!', 'error-toaster', 25000);
      console.log(error);
    })
  }

  registerAll() {
    let anyReg = this.curriculumCourses.filter(crs => crs.registered);
    let swicthTo: boolean;

    if ((anyReg.length && anyReg.length !== this.curriculumCourses.length) || !anyReg.length) {
      swicthTo = true;
    } else {
      swicthTo = false;
    }
    this.curriculumCourses.forEach(c => {
      c.registered = swicthTo;
    });
  }

}
