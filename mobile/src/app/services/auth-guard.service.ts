import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, Router } from '@angular/router';
import { AuthService } from './auth.service';

@Injectable()
export class AuthGuard implements CanActivate {
    constructor(
      public authService: AuthService,
      private router: Router
    ) {}

    canActivate(route: ActivatedRouteSnapshot): boolean {
      console.log("Here");
      console.log(this.authService.isAuthenticated());
      if (!this.authService.isAuthenticated()) {
        this.router.navigate(["login"]);
        return true;
      }
  
      return true;
    }
}
