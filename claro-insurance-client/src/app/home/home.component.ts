import { Component, OnInit } from '@angular/core';
import { StudentService } from '../_services/student.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  content?: any;
  constructor(private studentService: StudentService, private router: Router) { }

  ngOnInit(): void {
    this.studentService.allStudent().subscribe({
      next: data => {
        data = JSON.parse(data).data
        this.content = data;
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


  edit(id: string){
    console.log("edit")
    this.router.navigate(['/student', id]);
  }

  delete(student: any){
    this.studentService.deleteStudent(student).subscribe(() => {
      this.ngOnInit();
    })
  }

  create(){
    this.router.navigate(['/students']);
  }
}
