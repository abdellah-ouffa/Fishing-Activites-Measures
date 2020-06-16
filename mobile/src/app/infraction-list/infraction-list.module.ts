import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { InfractionListPageRoutingModule } from './infraction-list-routing.module';

import { InfractionListPage } from './infraction-list.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    InfractionListPageRoutingModule
  ],
  declarations: [InfractionListPage]
})
export class InfractionListPageModule {}
