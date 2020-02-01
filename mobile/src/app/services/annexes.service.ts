import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Helper } from '../helpers/helper';

@Injectable({
  providedIn: 'root'
})
export class AnnexesService {
  API_URL = environment.API_URL;

  constructor(
    private http: HttpClient,
    private helper: Helper
  ) {}

  getAuthorizationHeader() {
    
  }

  getAnnexes(token): Observable<any> {
    console.log(token);
    const httpOptions = {
      headers: new HttpHeaders({
          'Authorization': 'Bearer ' + token
      })
    };

    return this.http.get(this.API_URL + '/rules', httpOptions);
  }
}
