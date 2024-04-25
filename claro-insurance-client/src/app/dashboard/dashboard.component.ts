import { Component, OnInit } from '@angular/core';
import { TopService } from "@app/_services/top.service";
import { Router } from '@angular/router';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrl: './dashboard.component.css'
})
export class DashboardComponent implements OnInit {
  content?: any;
  top_courses: any;
  top_students: any;
  total_courses?: number;
  total_students?: number;
  constructor(private topService: TopService, private router: Router) { }

  ngOnInit(): void {
    this.topService.top().subscribe({
      next: data => {
        data = JSON.parse(data).data
        this.top_courses = data.top_courses;
        this.top_students = data.top_students;
        this.total_courses = data.total_courses;
        this.total_students = data.total_students;
        console.log(data)
      },
      error: err => {
        if (err.error) {
          try {
            const res = JSON.parse(err.error);
            this.content = res.message;
          } catch {
            this.content = `Error with status: ${err.status} - ${err.statusText}`;
          }
        } else {
          this.content = `Error with status: ${err.status}`;
        }
      }
    });
  }

}
