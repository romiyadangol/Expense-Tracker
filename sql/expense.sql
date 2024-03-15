CREATE DATABASE expense_track;

USE expense_track;

CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    label VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL
);

INSERT INTO categories (label) VALUES
('Food & Groceries'), ('Transportation'), ('Housing & Utilities'), ('Entertainment & Leisure'), ('Education'), ('Health & Wellness');

CREATE TABLE exp (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    amount DOUBLE NOT NULL,
    description VARCHAR(50),
    expenses_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

SELECT * FROM exp;

 update exp set title = 'test' , amount = '1000' where id = '2';
 select * from exp;