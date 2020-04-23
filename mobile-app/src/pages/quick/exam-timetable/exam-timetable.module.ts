import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ExamTimetablePage } from './exam-timetable';
import { ComponentsModule } from '../../../components/components.module';

@NgModule({
  declarations: [
    ExamTimetablePage,
  ],
  imports: [
    IonicPageModule.forChild(ExamTimetablePage),
    ComponentsModule
  ],
})
export class ExamTimetablePageModule { }
