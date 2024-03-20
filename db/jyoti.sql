create table semester(
	batch_id int PRIMARY KEY AUTO_INCREMENT ,
    batch_name varchar(255) not null,
    status varchar(255)
);
-- create table student(
-- 	student_id int PRIMARY KEY AUTO_INCREMENT,
--   	student_name varchar(255) not null,
--     phone bigint not null,
--     Email varchar(255) UNIQUE not null,
--     Status varchar(20),
--     Password varchar(255) not null,
--     s_user_id varchar(255) not null UNIQUE,
--     b_id int,
--     FOREIGN KEY(b_id) REFERENCES semester(batch_id)
-- );
CREATE TABLE  student (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    Email VARCHAR(255) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    s_user_id VARCHAR(50) NOT NULL,
    semester VARCHAR(20) NOT NULL,
    student_status VARCHAR(20) default NULL
);
create table admin(
	admin_id int PRIMARY KEY AUTO_INCREMENT,
    username_id varchar(255) not null UNIQUE,
    password varchar(255) not null
);

create table event(
event_id int PRIMARY KEY AUTO_INCREMENT,
    venue varchar(255) not null,
    e_time time not null,
    e_status varchar(20),
    e_picture varchar(255),
    e_location varchar(255)
);
create table volunteer(
v_id int PRIMARY KEY AUTO_INCREMENT,
    task_assign varchar(255) ,
    v_status varchar(20) ,
    std_id int,
    evet_id int,
    FOREIGN KEY(std_id) REFERENCES student(student_id),
    FOREIGN KEY(evet_id) REFERENCES eevent(event_id)
);
CREATE TABLE participants(
    p_id int PRIMARY KEY AUTO_INCREMENT,
    task_assign varchar(255),
    p_status varchar(25),
 	stud_id int,
    evt_id int,
    FOREIGN KEY(stud_id) REFERENCES student(student_id),
    FOREIGN KEY(evt_id) REFERENCES eevent(event_id)
);