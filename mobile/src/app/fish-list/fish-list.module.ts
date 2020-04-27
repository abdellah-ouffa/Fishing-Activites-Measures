import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { FishListPageRoutingModule } from './fish-list-routing.module';

import { FishListPage } from './fish-list.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    FishListPageRoutingModule
  ],
  declarations: [FishListPage]
})
export class FishListPageModule {}
