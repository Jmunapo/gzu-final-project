import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { EmploymentHistoryTabPage } from './employment-history-tab';

@NgModule({
  declarations: [
    EmploymentHistoryTabPage,
  ],
  imports: [
    IonicPageModule.forChild(EmploymentHistoryTabPage),
  ],
})
export class EmploymentHistoryTabPageModule {}
