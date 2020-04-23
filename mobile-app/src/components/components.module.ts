import { NgModule } from '@angular/core';
import { PageLoaderComponent } from './page-loader/page-loader';
import { AccordionListComponent } from './accordion-list/accordion-list';
import { IonicPageModule } from 'ionic-angular';
@NgModule({
    declarations: [PageLoaderComponent,
        AccordionListComponent],
    imports: [
        IonicPageModule,
    ],
    exports: [PageLoaderComponent,
        AccordionListComponent]
})
export class ComponentsModule { }
