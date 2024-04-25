import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '@env/environments';

const API_URL = environment.api_url + 'top/courses';
const API_CSRF = environment.endpoint_csrf;

@Injectable({
  providedIn: 'root',
})
export class TopService {
  constructor(private http: HttpClient) {
    this.http.get(API_CSRF).subscribe();
  }

  top(): Observable<any> {
    return this.http.get(API_URL, { responseType: 'text' });
  }

}
