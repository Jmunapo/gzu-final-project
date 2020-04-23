import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';

import { IonicStorageModule } from '@ionic/storage';

import { SuperTabsModule } from 'ionic2-super-tabs';

import { MyApp } from './app.component';

import { StatusBar } from '@ionic-native/status-bar';
import { SplashScreen } from '@ionic-native/splash-screen';
import { ApplicantsProvider } from '../providers/applicants/applicants';
import { HttpClientModule } from '@angular/common/http';
import { ApiProvider } from '../providers/api/api';
import { FileHandlerProvider } from '../providers/file-handler/file-handler';
import { AuthProvider } from '../providers/auth/auth';
import { GlobalFuncsProvider } from '../providers/global-funcs/global-funcs';

import { CacheModule } from "ionic-cache";

import { OneSignal } from '@ionic-native/onesignal'; //GitHub Acc
import { RemoteProvider } from '../providers/remote/remote';
import { FinanceOptionsPage } from '../pages/quick/finance/finance-options/finance-options';

import { SocialSharing } from "@ionic-native/social-sharing";
import { TransInfoModalPage } from '../pages/quick/finance/trans-info-modal/trans-info-modal';

import { File } from '@ionic-native/file';
import { FileOpener } from '@ionic-native/file-opener';

import { NgCalendarModule } from 'ionic2-calendar';
import { IonicImageLoader } from 'ionic-image-loader';

import { IonicImageViewerModule } from 'ionic-img-viewer';


@NgModule({
  declarations: [
    MyApp,
    FinanceOptionsPage,
    TransInfoModalPage
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    NgCalendarModule,
    IonicImageViewerModule,
    SuperTabsModule.forRoot(),
    IonicImageLoader.forRoot(),
    IonicModule.forRoot(MyApp),
    IonicStorageModule.forRoot({
      name: 'GZU_MOB_',
      driverOrder: ['indexeddb', 'sqlite', 'websql']
    }),
    CacheModule.forRoot({ keyPrefix: 'gzu_cache_' })
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    FinanceOptionsPage,
    TransInfoModalPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    { provide: ErrorHandler, useClass: IonicErrorHandler },
    ApplicantsProvider,
    ApiProvider,
    FileHandlerProvider,
    SocialSharing,
    AuthProvider,
    GlobalFuncsProvider,
    OneSignal,
    RemoteProvider,
    File,
    FileOpener
  ]
})
export class AppModule { }
