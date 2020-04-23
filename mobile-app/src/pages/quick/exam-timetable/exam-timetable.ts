import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { GlobalFuncsProvider } from '../../../providers/global-funcs/global-funcs';
import { RemoteProvider } from '../../../providers/remote/remote';
import { timer } from 'rxjs/observable/timer';
import { Storage } from '@ionic/storage';

@IonicPage()
@Component({
  selector: 'page-exam-timetable',
  templateUrl: 'exam-timetable.html',
})
export class ExamTimetablePage {

  TOKEN: string;

  fill: string = "#1a237e";

  loaded: boolean = false;

  has_registered: boolean = false;
  ttable_notfound: boolean = false;

  ttable: Array<any> = [];


  constructor(public navCtrl: NavController,
    public remote: RemoteProvider,
    private _gf: GlobalFuncsProvider,
    public storage: Storage,
    public navParams: NavParams) {
    const token = this.navParams.data;
    this.TOKEN = token;
    if (token) {
      this.remote.getTTable(token).subscribe((ttable: Array<any>) => {
        console.log(ttable)
        this.loaded = true;
        if (!ttable || !ttable.length) {
          this.ttable_notfound = true;
          return false;
        }
        this.ttable = ttable;
      }, (e) => {
        console.log(e);
        this.loaded = this.ttable_notfound = true;
      })
    } else {
      this.ttable_notfound = this.loaded = true;
    }
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ExamTimetablePage');
  }

  addToCalendar() {
    let user_events = [];
    this.ttable.forEach(e => {
      let ev = {
        title: e.course_code,
        place: e.venue,
        startTime: new Date(e.date),
        endTime: new Date(new Date(e.date).getTime() + (1000 * 60 * 60 * 3)),
        allDay: false,
        notes: `Sitting position: ${e.position}`
      }
      user_events.push(ev);
    });

    this.storage.set('MY_EVENTS', user_events)
      .then(() => {
        this._gf.showToster('Exam dates added', 'info-toaster', 1000);
        timer(1100).subscribe(() => this.navCtrl.push('CalendarPage'));
      })
      .catch(() => this._gf.showToster('Failed, close and re-open app', 'error-toaster', 1000))

    console.log(user_events);

  }

}
