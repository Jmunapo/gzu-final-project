import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, Events } from 'ionic-angular';
import { FormBuilder, FormGroup, Validators, FormArray } from '@angular/forms';


@IonicPage()
@Component({
  selector: 'page-employment-history-tab',
  templateUrl: 'employment-history-tab.html',
})
export class EmploymentHistoryTabPage {
  public form: FormGroup;
  today = new Date().toISOString();
  from_date: any;
  univasityStaff: boolean = false;

  constructor(public navCtrl: NavController, public navParams: NavParams,
    private _FB: FormBuilder, private formNextEvent: Events) {
    this.form = this._FB.group({
      company_name: ['', Validators.required],
      occupation: ['', Validators.required],
      job_description: ['', Validators.required],
      from: ['', Validators.required],
      to: ['', Validators.required],
      university_staff: ['', Validators.required],
      employment: this._FB.array([]),
      unistaff: this._FB.array([]),
    });
  }

  initEmployment(): FormGroup {
    return this._FB.group({
      company_name: ['', Validators.required],
      occupation: ['', Validators.required],
      job_description: ['', Validators.required],
      from: ['', Validators.required],
      to: ['', Validators.required],
    });
  }
  addNewInputField(): void {
    const control = <FormArray>this.form.controls.employment;
    control.push(this.initEmployment());
  }

  removeInputField(i: number): void {
    const control = <FormArray>this.form.controls.employment;
    control.removeAt(i);
  }

  manage(val: any): void {
    let emp = {
      company_name: val.company_name,
      occupation: val.occupation,
      job_description: val.job_description,
      from: val.from,
      to: val.to
    }
    let subjects = [emp, ...val.employment, ...val.unistaff];
    let dateFix = subjects.map((emp, i) => {
      let f = emp.from;
      let t = emp.to;
      let from = new Date(f);
      let to = new Date(t);

      if (from > to) {
        emp.from = t;
        emp.to = f
      }
      return emp;
    })
    console.log(dateFix);
    let data = {
      key: 'employment_history',
      val: dateFix
    }
    this.formNextEvent.publish('form:next', data);
  }

  skipEmploy() {
    let data = {
      key: 'employment_history',
      val: []
    }
    this.formNextEvent.publish('form:next', data);
  }

  isUniStaff(e) {
    const control = <FormArray>this.form.controls.unistaff;
    if (e === 'yes') {

      control.push(
        this._FB.group({
          staff_name: ['', Validators.required],
          staff_department: ['', Validators.required],
          staff_phone: ['', Validators.required]
        })
      )
    } else if (e === 'no' && control.at(0)) {
      control.removeAt(0);
    }
  }

}
