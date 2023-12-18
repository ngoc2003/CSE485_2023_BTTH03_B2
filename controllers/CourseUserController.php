<?php
require_once 'models/CourseUser.php';


class CourseUserController {
    public function index() {
        $id = $_GET['id'];
        $coursesUser = $this->getEnrolledCoursesByUserId($id);

        require 'views/courseUser/index.php';
    }

    public function create() {
        $id = $_GET['id'];
        $unEnrolledCoursesUser = $this->getUnEnrolledCoursesByUserId($id);

        require 'views/courseUser/create.php';
    }

    public static function enroll() {
        $userId = $_GET['userId'];
        $courseId = $_GET['courseId'];


        $object = new CourseUser();
        $object->setUserId($userId);
        $object->setCourseId($courseId);
        $object->enroll();

        header("location: index.php?controller=courseUser&action=index&id=$userId");

    }

    public function getUnEnrolledCoursesByUserId($userId) {
        $object = new CourseUser();
        return $object->fetchUnEnrolledCoursesByUserId($userId);
    }

    public static function getEnrolledCoursesByUserId($userId) {
        $object = new CourseUser();
        return $object->fetchUserCourses($userId);
    }
}
?>
