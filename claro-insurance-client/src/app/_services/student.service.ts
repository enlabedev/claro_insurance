import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '@env/environments';

const API_URL = environment.api_url + 'students';
const API_CSRF = environment.endpoint_csrf;

@Injectable({
  providedIn: 'root',
})
export class StudentService {
  constructor(private http: HttpClient) {
    this.http.get(API_CSRF).subscribe();
  }

  allStudent(): Observable<any> {
    return this.http.get(API_URL, { responseType: 'text' });
  }

  showStudent(id:string): Observable<any> {
    return this.http.get(API_URL + '/'+ id, { responseType: 'text' });
  }

  updateStudent(id:string, data:any): Observable<any> {
    return this.http.put(API_URL + '/'+ id, data, { responseType: 'text' });
  }

  deleteStudent(id:string): Observable<any> {
    return this.http.delete(API_URL + '/'+ id, { responseType: 'text' });
  }

  createStudent(data:any): Observable<any> {
    return this.http.post(API_URL, data, { responseType: 'text' });
  }

  deleteCourse(id:string, course_id:string): Observable<any> {
    return this.http.delete(API_URL + '/'+ id + '/courses/' + course_id, { responseType: 'text' });
  }
}
