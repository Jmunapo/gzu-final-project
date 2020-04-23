import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events, LoadingController, AlertController } from 'ionic-angular';
import { SuperTabsController } from 'ionic2-super-tabs';

import * as V from 'voca';
import { ApplicantsProvider } from '../../../providers/applicants/applicants';
import { App } from 'ionic-angular';


@IonicPage()
@Component({
  selector: 'page-steps-tabs',
  templateUrl: 'steps-tabs.html',
})
export class StepsTabsPage {

  steps = {
    curr: 1,
    max: 1
  }

  applicantInfo: any = {};

  pushed: any = null;

  selectedTab = 0;

  tabtitles = {
    0: 'Personal Details',
    1: 'Contact Details',
    2: 'Programme Choices',
    3: 'Academic History',
    4: 'Employment History',
    5: 'Refrees'
  }

  tabs = [
    'PersonalDetailsTabPage',
    'ContactDetailsTabPage',
    'ProgrammeChoicesTabPage',
    'AcademicHistoryTabPage',
    'EmploymentHistoryTabPage',
    'RefreesTabPage',
  ];

  constructor(public navCtrl: NavController,
    public navParams: NavParams,
    public alertCtrl: AlertController,
    private app: App,
    private formNextEvent: Events,
    private applicants: ApplicantsProvider,
    private superTabs: SuperTabsController,
    public loadingCtrl: LoadingController) {
    this.steps.max = this.tabs.length;

  }

  ionViewDidLoad() {
    this.superTabs.enableTabsSwipe(false);
    this.superTabs.showToolbar(false);
    this.superTabs.slideTo(0);
    //this.steps.curr = 3;
    this.formNextEvent.subscribe('form:next', (data) => {
      if (data.key) {
        if (data.key === "academic_history" || data.key === "employment_history") {
          data.val = this.getObj(data.val, data.key);
          let k = Object.keys(data.val);
          for (let i = 0; i < k.length; i++) {
            const key = k[i];
            data.val[key] = V.replace(data.val[key], '|', '');
          }
        }
        this.applicantInfo = { ...this.applicantInfo, ...data.val }
      }
      this.goToNextStep();
      console.log(this.applicantInfo);
    });

    this.formNextEvent.subscribe('files', file => {
      if (file) {
        this.applicantInfo[file.for] = file.name;
      }
    })
  }

  private submitDetails() {
    let loader = this.loadingCtrl.create({
      content: "Submitting.."
    });
    loader.present();
    this.applicants.submitDetais(this.applicantInfo).subscribe(data => {
      loader.dismiss();
      this.app.getRootNav().setRoot('ApplicationReceivedPage');
    }, () => {
      loader.dismiss();
      const confirm = this.alertCtrl.create({
        subTitle: 'Oops! Something went wrong',
        message: 'Your form has an error close the app and reapply, if it persist please visit our website gzu.ac.zw',
        buttons: [{
          text: ' Ok '
        }]
      });
      confirm.present();
    })
  }

  goToPrevStep() {
    if (this.selectedTab === 0) {
      this.navCtrl.pop();
    } else {
      this.steps.curr--;
      this.selectedTab--;
      this.superTabs.slideTo(this.selectedTab);
    }
  }

  goToNextStep() {
    if (this.selectedTab !== this.steps.max - 1) {
      this.steps.curr++;
      this.selectedTab++;
      this.superTabs.slideTo(this.selectedTab);
    } else {
      const prompt = this.alertCtrl.create({
        title: 'Pay with Ecocash',
        message: "Enter the ecocash number to pay $20 application fee",
        inputs: [
          {
            name: 'number',
            type: 'tel',
            placeholder: '263775696233'
          },
        ],
        buttons: [
          {
            text: 'Cancel',
            handler: data => {
              console.log('Cancel clicked');
            }
          },
          {
            text: 'Ok',
            handler: data => {
              if (data.number) {
                this.processPayment(data.number);
              }

            }
          }
        ]
      });
      prompt.present();
    }
  }

  private processPayment(phone) {
    let loader = this.loadingCtrl.create({
      content: "Waiting..",
      spinner: 'bubbles'
    });
    loader.present();
    setTimeout(() => {
      loader.dismiss();
      this.submitDetails();
    }, 10000);
  }

  private getObj(val: Array<any>, key: string) {
    let o_level_academic_year = "";
    let o_level_exam_board = "";
    let o_level_subjects = "";
    let o_level_grade = "";
    let a_level_academic_year = "";
    let a_level_exam_board = "";
    let a_level_subjects = "";
    let a_level_grade = "";

    let award_year = "";
    let programme_name = "";
    let college_name = "";
    let degree_class = "";
    let college_adress = "";
    let college_phone = "";

    let organisation = "";
    let occupation = "";
    let duties = "";
    let from_date = "";
    let to_date = "";

    if (key === "academic_history") {
      for (let i = 0; i < val.length; i++) {
        const sub = val[i];
        if (sub.level === "'O' Level") {
          o_level_academic_year += `|${sub.passing_year}`;
          o_level_exam_board += `|${sub.exam_board}`;
          o_level_subjects += `|${sub.subject}`;
          o_level_grade += `|${sub.award_grade}`;
        } else if (sub.level === "'A' Level") {
          a_level_academic_year += `|${sub.passing_year}`;
          a_level_exam_board += `|${sub.exam_board}`;
          a_level_subjects += `|${sub.subject}`;
          a_level_grade += `|${sub.award_grade}`;
        } else {
          award_year += `|${sub.award_date}`
          programme_name += `|${sub.programme_name}`
          college_name += `|${sub.inistitution}`
          degree_class += `|${sub.award_class}`
          college_adress += `|${sub.inistitution_address}`
          college_phone += `|${sub.inistitution_phone}`
        }

      }
      return {
        o_level_academic_year,
        o_level_exam_board,
        o_level_subjects,
        o_level_grade,
        a_level_academic_year,
        a_level_exam_board,
        a_level_subjects,
        a_level_grade,
        award_year,
        programme_name,
        college_name,
        degree_class,
        college_adress,
        college_phone
      };
    } else {
      for (let i = 0; i < val.length; i++) {
        const sub = val[i];
        organisation += `|${sub.company_name}`;
        occupation += `|${sub.occupation}`;
        duties += `|${sub.job_description}`;
        from_date += `|${sub.from}`;
        to_date += `|${sub.to}`;
      }
      return {
        organisation,
        occupation,
        duties,
        from_date,
        to_date,
      }
    }
  }

}
