-- Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    location VARCHAR(100),
    gender VARCHAR(20),
    points INT DEFAULT 0,
    profile_pic VARCHAR(255),
    date_joined TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Posts Table
CREATE TABLE posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    cover_image VARCHAR(255),
    sdg_goal VARCHAR(50),
    status ENUM('Pending', 'Verified') DEFAULT 'Pending',
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Tips Table
CREATE TABLE tips (
    tip_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    sdg_goal VARCHAR(50),
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Blogs Table
CREATE TABLE blogs (
    blog_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(254),
    intro TEXT,
    cover_image VARCHAR(254),
    paragraphs TEXT,
    sdg_goal VARCHAR(50),
    posted_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Reactions Table
CREATE TABLE reactions (
    post_id INT,
    user_id INT,
    sdg_icon VARCHAR(50),
    PRIMARY KEY (user_id, post_id),
    FOREIGN KEY (post_id) REFERENCES posts(post_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Followers Table
CREATE TABLE followers (
    follower_id INT,
    followed_id INT,
    PRIMARY KEY(follower_id, followed_id),
    FOREIGN KEY (follower_id) REFERENCES users(user_id),
    FOREIGN KEY (followed_id) REFERENCES users(user_id)
);