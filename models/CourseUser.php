<?php
require_once 'config.php';

class CourseUser {
    private $courseId;
    private $userId;
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setCourseId ($courseId) {
        $this->courseId = $courseId;
    }
    public function setUserId ($userId) {
        $this->userId = $userId;
    }

    public function enroll() {
        $query = $this->db->prepare('INSERT INTO course_user (course_id, user_id) VALUES (:courseId, :userId)');
        $query->bindParam(':courseId', $this->courseId, PDO::PARAM_STR);
        $query->bindParam(':userId', $this->userId, PDO::PARAM_STR);
        $query->execute();
    }

    public function fetchUserCourses ($userId) {

        $query = $this->db->prepare('SELECT courses.* FROM courses
        JOIN course_user ON courses.id = course_user.course_id
        WHERE course_user.user_id = :user_id');

        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->execute();

        $enrolledCourses = $query->fetchAll(PDO::FETCH_ASSOC);

        return $enrolledCourses;
    }

    public function fetchUnEnrolledCoursesByUserId($userId) {
        $query = $this->db->prepare('SELECT courses.* FROM courses
          WHERE courses.id NOT IN ( SELECT course_id FROM course_user WHERE user_id = :user_id )');
        $query->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $query->execute();

        $unEnrolledCourses = $query->fetchAll(PDO::FETCH_ASSOC);

        return $unEnrolledCourses;
    }

}
?>
