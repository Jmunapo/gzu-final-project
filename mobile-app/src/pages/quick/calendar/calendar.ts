import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController } from 'ionic-angular';

import * as moment from 'moment';
import { timer } from 'rxjs/observable/timer';
import { Storage } from '@ionic/storage';

@IonicPage()
@Component({
  selector: 'page-calendar',
  templateUrl: 'calendar.html',
})
export class CalendarPage {

  fill: string = "#2196f3"
  loaded: boolean = true;

  eventSource = [{
    startTime: new Date(),
    endTime: new Date(),
    allDay: true,
    title: 'Defense day',
    place: 'Masvingo',
    notes: ''
  }];
  viewTitle: string;
  selectedDay = new Date();

  calendar = {
    mode: 'month',
    currentDate: new Date()
  };

  events: Array<any> = [];



  constructor(public navCtrl: NavController,
    private alertCtrl: AlertController,
    public storage: Storage,
    public navParams: NavParams) {
  }

  ionViewDidLoad() {
    //timer(500).subscribe(() => this.loaded = true);
    this.storage.get('MY_EVENTS').then((data: Array<any>) => {
      if (data && data.length) {
        this.eventSource = data;
      }
    })
  }

  onViewTitleChanged(title) {
    this.viewTitle = title;
  }

  onEventSelected(event) {
    let start = moment(event.startTime).format('LLLL');
    let end = moment(event.endTime).format('LLLL');

    let alert = this.alertCtrl.create({
      subTitle: '' + event.title,
      message: 'From: ' + start + '<br><br>To: ' + end,
      buttons: ['OK']
    })
    alert.present();
  }

  onCurrentDateChanged(event) {
    this.events = event.events;
  }

  humanDate(date) {
    return moment(date).format('lll');
  }

  onTimeSelected(ev) {
    this.selectedDay = ev.selectedTime;
    this.events = ev.events;
  }

}
