import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { AnnexeDetailsPageRoutingModule } from './annexe-details-routing.module';

import { AnnexeDetailsPage } from './annexe-details.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    AnnexeDetailsPageRoutingModule
  ],
  declarations: [AnnexeDetailsPage]
})
export class AnnexeDetailsPageModule {}
