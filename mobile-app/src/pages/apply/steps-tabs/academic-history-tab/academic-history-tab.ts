import { Component, ViewChild } from '@angular/core';
import { IonicPage, NavController, NavParams, AlertController, Events, ToastController, LoadingController } from 'ionic-angular';
import { FormBuilder, FormArray, FormGroup, Validators } from '@angular/forms';
import { FileHandlerProvider } from '../../../../providers/file-handler/file-handler';

import { Storage } from '@ionic/storage';

@IonicPage()
@Component({
  selector: 'page-academic-history-tab',
  templateUrl: 'academic-history-tab.html',
})
export class AcademicHistoryTabPage {
  public form: FormGroup;
  today = new Date().toISOString(); //set max-date

  @ViewChild('certFile') certFile: any; //to reset input file

  oldFile: string = null; //to remember and delete if changed

  dom_vars: any = {

  }

  constructor(public navCtrl: NavController, public navParams: NavParams,
    private _FB: FormBuilder, public alertCtrl: AlertController,
    private fileHandler: FileHandlerProvider, private storage: Storage,
    public toastCtrl: ToastController, public loadingCtrl: LoadingController,
    private formNextEvent: Events) {
    this.form = this._FB.group({
      subject: ['MATHEMATICS', Validators.required],
      passing_year: ['2010-12-03'],
      exam_board: ['', Validators.required],
      award_grade: ['', Validators.required],
      level: [`'O' Level`],
      academic_certificates: ['', Validators.required],
      subjects: this._FB.array([
        this._FB.group({
          subject: ['ENGLISH', Validators.required],
          passing_year: ['2010-12-03'],
          exam_board: ['', Validators.required],
          award_grade: ['', Validators.required],
          level: [`'O' Level`],
        })
      ]),
      degree: this._FB.array([])
    });

  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad AcademicHistoryTabPage');
  }

  initSubject(level: string = `'O' Level`): FormGroup {
    return this._FB.group({
      subject: ['', Validators.required],
      passing_year: ['2010-12-03'],
      exam_board: ['', Validators.required],
      award_grade: ['', Validators.required],
      level: [`${level}`],
    });
  }

  initDegree(): FormGroup {
    return this._FB.group({
      programme_name: ['', Validators.required],
      award_date: ['2010-12-03'],
      inistitution: ['', Validators.required],
      award_class: ['', Validators.required],
      inistitution_address: ['', Validators.required],
      inistitution_phone: ['', Validators.required],
      level: [`Deg/Cert`],
    });
  }

  addNewInputField(): void {
    const confirm = this.alertCtrl.create(
      {
        message: 'Academic Level'
      }
    );
    confirm.addInput({
      type: 'radio',
      label: 'Ordinary Level Subject',
      value: `'O' Level`,
      checked: true
    });

    confirm.addInput({
      type: 'radio',
      label: 'Advanced Level Subject',
      value: `'A' Level`,
      checked: false
    });

    confirm.addInput({
      type: 'radio',
      label: 'Degree / Certificate',
      value: `deg/Cert`,
      checked: false
    });

    confirm.addButton('Cancel');
    confirm.addButton({
      text: 'OK',
      handler: data => {
        if (data === 'deg/Cert') {
          const degrees = <FormArray>this.form.controls.degree;
          degrees.push(this.initDegree());
          return
        }
        const control = <FormArray>this.form.controls.subjects;
        control.push(this.initSubject(data));
      }
    });
    confirm.present();

  }

  removeInputField(i: number, type = "subjects"): void {
    const control = <FormArray>this.form.controls[type];
    control.removeAt(i);
  }

  manage(val: any): void {
    let maths = {
      award_grade: val.award_grade,
      exam_board: val.exam_board,
      level: val.level,
      passing_year: val.passing_year,
      subject: val.subject
    }
    this.formNextEvent.publish('files', { for: 'academic_certificates', name: this.oldFile })
    let subjects = [maths, ...val.subjects, ...val.degree];
    let data = {
      key: 'academic_history',
      val: subjects
    }
    this.formNextEvent.publish('form:next', data);
  }

  fileUpload(e, doc) {
    let file = e.target.files[0];
    if (!this.isCorrectFileType(file.name)) {
      e.value = '';
      let toast = this.toastCtrl.create({
        message: `Error! Not a valid file type`,
        duration: 2000,
        position: 'top'
      });
      toast.present();
      return false;
    }
    if (file) {
      this.dom_vars[doc] = file.name;
      this.storage.get('NAT_ID').then(nat_id => {
        let file_prifix = (nat_id) ? nat_id : '12-34567X89';
        let file_name = file_prifix + '_' + doc + '_' + file.name;
        let loader = this.loadingCtrl.create({
          content: "Uploading.."
        });
        loader.present();
        this.fileHandler.postFile(file, file_name).subscribe((res: any) => {
          if (res) {
            if (this.oldFile) {
              this.fileHandler.delFile(this.oldFile).subscribe(() => "", e => "");
            }
            this.oldFile = file_name;
            loader.dismiss();
          }
        }, () => {
          this.certFile.nativeElement.value = '';
          delete this.dom_vars.academic_certificates;
          loader.dismiss();
          const confirm = this.alertCtrl.create({
            subTitle: 'Oops! Uploading fail',
            message: 'Check your internet connection and retry',
            buttons: [{ text: ' Ok ' }]
          });
          confirm.present();
        });
      })
    }
  }

  isCorrectFileType(file) {
    const regex = new RegExp("(.*?)\.(pdf|docx|stw|doc)$");
    return regex.test(file);
  }

}
