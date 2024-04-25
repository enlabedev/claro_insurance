import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '@env/environments';

const API_URL = environment.api_url + 'courses';
const API_CSRF = environment.endpoint_csrf;

@Injectable({
  providedIn: 'root',
})
export class CourseService {
  constructor(private http: HttpClient) {
    this.http.get(API_CSRF).subscribe();
  }

  allCourse(): Observable<any> {
    return this.http.get(API_URL, { responseType: 'text' });
  }

  showCourse(id:string): Observable<any> {
    return this.http.get(API_URL + '/'+ id, { responseType: 'text' });
  }

  updateCourse(id:string, data:any): Observable<any> {
    return this.http.put(API_URL + '/'+ id, data, { responseType: 'text' });
  }

  deleteCourse(id:string): Observable<any> {
    return this.http.delete(API_URL + '/'+ id, { responseType: 'text' });
  }

  createCourse(data:any): Observable<any> {
    return this.http.post(API_URL, data, { responseType: 'text' });
  }

}
