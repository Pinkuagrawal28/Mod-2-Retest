use retest;

CREATE TABLE userlist (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  email VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  role ENUM('normal', 'admin') NOT NULL,
  created_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE players (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  employee_id VARCHAR(255) NOT NULL,
  employee_name VARCHAR(255) NOT NULL,
  points VARCHAR(20) NOT NULL,
  player_type ENUM('ball', 'bat', 'all') NOT NULL,
  created_time DATETIME DEFAULT CURRENT_TIMESTAMP
);
