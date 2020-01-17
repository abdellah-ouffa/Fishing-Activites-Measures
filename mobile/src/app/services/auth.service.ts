import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  API_URL = environment.API_URL;

  constructor(private http: HttpClient) { }

  login (credentials: any) { 
    console.log(this.API_URL + '/login')
    this.http.post(this.API_URL + '/login', credentials)
      .subscribe(response => {
        console.log(response);
      });
  }
}
