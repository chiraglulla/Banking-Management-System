CREATE TABLE user_details (
    id int NOT NULL;
    name VARCHAR(255);
    email VARCHAR(255);
    current_balance int;
    PRIMARY KEY (id);
);

INSERT INTO user_details VALUES (
    1,
    "Chirag Lulla",
    "lullachirag@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    2,
    "Umang Thadani",
    "umangthadani@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    3,
    "Gaurav Wadhwa",
    "gauravwadhwa@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    4,
    "Aayush Wadhwani",
    "aayushwadhwani@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    5,
    "Mayur Kukreja",
    "mayurkukreja@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    6,
    "Sahil Changlani",
    "sahilchanglani@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    7,
    "Tanya Amesar",
    "tanyaamesar@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    8,
    "Kunal Budhrani",
    "kunalbudhrani@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    9,
    "Kashish Phulwani",
    "kashishphulwani@gmail.com",
    10000
);

INSERT INTO user_details VALUES (
    10,
    "Yogini Mulchandani",
    "yoginimulchandani@gmail.com",
    10000
);

ALTER TABLE user_details 
ADD UNIQUE (email);


CREATE TABLE transactions (
    id int AUTO_INCREMENT,
    from_id int NOT NULL,
    to_id int NOT NULL,
    amount int NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (to_id) REFERENCES user_details(id),
    FOREIGN KEY (from_id) REFERENCES user_details(id),
    PRIMARY KEY (id)
);