import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ContactDetailsTabPage } from './contact-details-tab';

@NgModule({
  declarations: [
    ContactDetailsTabPage,
  ],
  imports: [
    IonicPageModule.forChild(ContactDetailsTabPage),
  ],
})
export class ContactDetailsTabPageModule {}
