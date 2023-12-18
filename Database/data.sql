-- Insert sample data into the 'users' table -- admin123
INSERT INTO users (name, email, password) VALUES
    ('John Doe', 'john.doe@example.com', '$2y$10$N/ibOJm38SgqPjmLaPTEi.k9B8wn.NJblWaM1.5brx/EftkiBpICO'),
    ('Jane Smith', 'jane.smith@example.com', '$2y$10$N/ibOJm38SgqPjmLaPTEi.k9B8wn.NJblWaM1.5brx/EftkiBpICO');

-- Insert sample data into the 'courses' table
INSERT INTO courses (title, description) VALUES
    ('Introduction to Programming', 'Learn the basics of programming'),
    ('Web Development Fundamentals', 'Explore web development concepts');

-- Insert sample data into the 'course_user' table
INSERT INTO course_user (course_id, user_id) VALUES
    (1, 1),
    (1, 2),
    (2, 2);

-- Insert sample data into the 'lessons' table
INSERT INTO lessons (course_id, title, description) VALUES
    (1, 'Getting Started with Programming', 'Overview of programming languages'),
    (1, 'Variables and Data Types', 'Understanding variables and data types'),
    (2, 'HTML Basics', 'Introduction to HTML');

-- Insert sample data into the 'materials' table
INSERT INTO materials (lesson_id, title, file_path) VALUES
    (1, 'Programming Basics Slide', '/path/to/slides.pdf'),
    (2, 'Data Types Cheat Sheet', '/path/to/cheat-sheet.pdf'),
    (3, 'HTML Tutorial Video', '/path/to/tutorial.mp4');

-- Insert sample data into the 'quizzes' table
INSERT INTO quizzes (lesson_id, title) VALUES
    (1, 'Programming Basics Quiz'),
    (3, 'HTML Fundamentals Quiz');

-- Insert sample data into the 'questions' table
INSERT INTO questions (quiz_id, question) VALUES
    (1, 'What is a variable?'),
    (2, 'What does HTML stand for?');

-- Insert sample data into the 'options' table
INSERT INTO options (question_id, `option`, is_correct) VALUES
    (1, 'A container for storing data', 1),
    (1, 'A way to control the flow of a program', 0),
    (2, 'HyperText Markup Language', 1),
    (2, 'High-Level Text Management Language', 0);
