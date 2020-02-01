import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';
import { Observable } from 'rxjs';
import { BehaviorSubject } from 'rxjs';
import { ToastController, Platform } from '@ionic/angular';
import { Router } from '@angular/router';
import { Helper } from '../helpers/helper';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  API_URL = environment.API_URL;
  authState = new BehaviorSubject(false);

  constructor(
    private http: HttpClient,
    private router: Router,
    private platform: Platform,
    private helper: Helper
  ) { 
    this.ifLoggedIn();
  }

  async ifLoggedIn() {
    if(this.helper.getAuthUser()) {
      this.authState.next(true);
    } else {
      this.authState.next(false);
    }
  }

  login (credentials: any): Observable<any> {
    this.authState.next(true);
    return this.http.post(this.API_URL + '/login', credentials)
  }

  logout() {
    this.helper.destroyAuthUser();
    this.router.navigate(['login']);
    this.authState.next(false);
  }

  isAuthenticated() {
    let test = this.authState;
    let test4 = this.authState.getValue();
    console.log(test);
    console.log(test4);
    return this.authState.value;
  }
}