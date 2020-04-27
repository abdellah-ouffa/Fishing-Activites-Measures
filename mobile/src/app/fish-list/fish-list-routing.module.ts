import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FishListPage } from './fish-list.page';

const routes: Routes = [
  {
    path: '',
    component: FishListPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class FishListPageRoutingModule {}
