import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { PersonalDetailsTabPage } from './personal-details-tab';

@NgModule({
  declarations: [
    PersonalDetailsTabPage,
  ],
  imports: [
    IonicPageModule.forChild(PersonalDetailsTabPage),
  ],
})
export class PersonalDetailsTabPageModule {}
