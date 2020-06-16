import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Helper } from '../helpers/helper';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class InfractionService {
  API_URL = environment.API_URL;

  constructor(
    private http: HttpClient,
    private helper: Helper
  ) {}

  getInfractions(token): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
          'Authorization': 'Bearer ' + token 
      })
    };

    return this.http.get(this.API_URL + '/infractions', httpOptions);
  }
}
