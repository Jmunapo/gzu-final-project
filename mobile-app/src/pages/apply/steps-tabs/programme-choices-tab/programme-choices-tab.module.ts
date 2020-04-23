import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ProgrammeChoicesTabPage } from './programme-choices-tab';
import { SearchVanishDirective } from '../../../../directives/search-vanish/search-vanish';

@NgModule({
  declarations: [
    ProgrammeChoicesTabPage,
    SearchVanishDirective

  ],
  imports: [
    IonicPageModule.forChild(ProgrammeChoicesTabPage),
  ],
})
export class ProgrammeChoicesTabPageModule { }
