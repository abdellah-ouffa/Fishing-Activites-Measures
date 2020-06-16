import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { InfractionListPage } from './infraction-list.page';

const routes: Routes = [
  {
    path: '',
    component: InfractionListPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class InfractionListPageRoutingModule {}
