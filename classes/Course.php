<?php

namespace classes;

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