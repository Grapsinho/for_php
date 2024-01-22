<?php

namespace classes;

class Teacher
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function teach()
    {
        echo "$this->name: Teaching\n";
    }
}

class Student
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function learn()
    {
        echo "$this->name: Learning\n";
    }
}

class Course
{
    private $course;
    private $students;
    private $teacher;

    public function __construct($course, Teacher $teacher, array $students)
    {
        $this->course = $course;
        $this->students = $students;
        $this->teacher = $teacher;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function course_desc()
    {
        echo "Course name: $this->course \n";
        echo "Teacher: {$this->teacher->name} \n";

        echo "Students: ";

        foreach ($this->students as $student) {
            echo $student->name . ", ";
        }
    }
}

class School
{
    private $teacher;
    private $students;
    private $courses;

    public function __construct(array $teacher, array $students, array $courses)
    {
        $this->teacher = $teacher;
        $this->students = $students;
        $this->courses = $courses;
    }

    public function schoolDesc()
    {
        echo "Courses: ";
        foreach ($this->courses as $course) {
            echo $course->getCourse() . ", ";
        }

        echo "\n";

        echo "students: ";
        foreach ($this->students as $student) {
            echo $student->name . ", ";
        }

        echo "\n";
        echo "teachers: ";
        foreach ($this->teacher as $teach) {
            echo $teach->name . ", ";
        }
    }
}

$teacher1 = new Teacher('name 1 teach');
$teacher2 = new Teacher('name 2 teach');
$teacher3 = new Teacher('name 3 teach');

$student1 = new Student('name 1 learn');
$student2 = new Student('name 2 learn');
$student3 = new Student('name 3 learn');

$arr1 = [$teacher1, $teacher2, $teacher3];
$arr2 = [$student1, $student2, $student3];

$course1 = new Course('Math', $teacher1, $arr2);
$course2 = new Course('Geography', $teacher2, $arr2);
$course3 = new Course('Biology', $teacher3, $arr2);

$arr3 = [$course1, $course2, $course3];

$school = new School($arr1, $arr2, $arr3);

$school->schoolDesc();

/*
output:
Courses: Math, Geography, Biology,
students: name 1 learn, name 2 learn, name 3 learn,
teachers: name 1 teach, name 2 teach, name 3 teach,
*/
