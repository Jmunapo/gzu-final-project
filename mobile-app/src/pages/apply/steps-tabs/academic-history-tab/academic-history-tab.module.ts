import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { AcademicHistoryTabPage } from './academic-history-tab';

@NgModule({
  declarations: [
    AcademicHistoryTabPage,
  ],
  imports: [
    IonicPageModule.forChild(AcademicHistoryTabPage),
  ],
})
export class AcademicHistoryTabPageModule {}
