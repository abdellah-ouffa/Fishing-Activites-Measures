import { Injectable } from '@angular/core';
import { environment } from '../../environments/environment';
import { Helper } from '../helpers/helper';
import { Observable } from 'rxjs';
import { HttpHeaders, HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CategoryService {
  API_URL = environment.API_URL;

  constructor(
    private http: HttpClient,
    private helper: Helper
  ) {}

  getCategories(token): Observable<any> {
    const httpOptions = {
      headers: new HttpHeaders({
          'Authorization': 'Bearer ' + token 
      })
    };

    return this.http.get(this.API_URL + '/categories', httpOptions);
  }
}
