import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { AuthGuard } from './services/auth-guard.service';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'home',
    pathMatch: 'full'
  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then(m => m.HomePageModule),
    canActivate: [AuthGuard]
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule)
  },
  {
    path: 'annexe-details',
    loadChildren: () => import('./annexe-details/annexe-details.module').then( m => m.AnnexeDetailsPageModule)
  },
  {
    path: 'annexe-list',
    loadChildren: () => import('./annexe-list/annexe-list.module').then( m => m.AnnexeListPageModule)
  },
  {
    path: 'category-list',
    loadChildren: () => import('./category-list/category-list.module').then( m => m.CategoryListPageModule)
  },
  {
    path: 'fish-list',
    loadChildren: () => import('./fish-list/fish-list.module').then( m => m.FishListPageModule)
  },
  {
    path: 'fish-details',
    loadChildren: () => import('./fish-details/fish-details.module').then( m => m.FishDetailsPageModule)
  },
  {
    path: 'fish-measure',
    loadChildren: () => import('./fish-measure/fish-measure.module').then( m => m.FishMeasurePageModule)
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
