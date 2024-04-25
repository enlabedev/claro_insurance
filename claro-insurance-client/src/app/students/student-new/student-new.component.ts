import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { StudentService } from '@app/_services/student.service';
import { CourseService} from "@app/_services/course.service";
import { Router } from '@angular/router';

@Component({
  selector: 'app-student-new',
  templateUrl: './student-new.component.html',
  styleUrl: './student-new.component.css'
})
export class StudentNewComponent implements OnInit{
  id?: string;
  name?: string;
  lastname?: string;
  age?: number;
  cedula?: string;
  email?: string;
  courses?: any;
  course_id?: string;

  constructor(private studentService: StudentService, private router: Router, private courseService: CourseService) { }

  ngOnInit(): void {
    this.courseService.allCourse().subscribe(courses => {
      this.courses = JSON.parse(courses).data;
    })
  }

  onSubmit(form: NgForm): void {
    const formData =  {
      name: this.name,
      lastname: this.lastname,
      age: this.age,
      cedula: this.cedula,
      email: this.email,
      course_id: this.course_id
    };

    this.studentService.createStudent(formData).subscribe(() => {
      this.router.navigate(['/home']);
    });

  }
}


