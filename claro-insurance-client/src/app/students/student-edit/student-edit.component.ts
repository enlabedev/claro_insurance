import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { StudentService } from '@app/_services/student.service';
import { Router, ActivatedRoute, ParamMap  } from '@angular/router';


@Component({
  selector: 'app-student-edit',
  templateUrl: './student-edit.component.html',
  styleUrls: ['./student-edit.component.css']
})
export class StudentEditComponent implements OnInit {
  id?: any;
  name?: string;
  lastname?: string;
  age?: number;
  cedula?: string;
  email?: string;
  courses?: any;

  constructor(private studentService: StudentService, private route: ActivatedRoute,
              private router: Router) { }

  ngOnInit(): void {
    this.id = this.route.snapshot.paramMap.get('id');
    this.studentService.showStudent(this.id).subscribe(student => {
      const data = JSON.parse(student).data
      this.name = data.name;
      this.lastname = data.lastname;
      this.age = data.age;
      this.cedula = data.cedula;
      this.email = data.email;
      this.courses = data.courses;
    });
  }


  onSubmit(form: NgForm): void {
    const formData =  {
      name: this.name,
      lastname: this.lastname,
      age: this.age,
      cedula: this.cedula,
      email: this.email
    };

    this.studentService.updateStudent(this.id, formData).subscribe(() => {
      this.router.navigate(['/home']);
    });

  }


  edit(id: string){
    console.log("edit")
    this.router.navigate(['/student', id]);
  }

  delete(student: any, course: any){
    this.studentService.deleteCourse(student, course).subscribe(() => {
      this.ngOnInit();
    });
  }
}
