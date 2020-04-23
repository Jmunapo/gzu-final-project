import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ProgrammesInfoPage } from './programmes-info';

@NgModule({
  declarations: [
    ProgrammesInfoPage,
  ],
  imports: [
    IonicPageModule.forChild(ProgrammesInfoPage),
  ],
})
export class ProgrammesInfoPageModule {}
