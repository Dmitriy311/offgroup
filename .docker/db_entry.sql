SET NAMES utf8mb4;
CREATE TABLE `user` (
                      id INT AUTO_INCREMENT,
                      full_name VARCHAR(255) NOT NULL,
                      created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                      updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `order`(
                         id INT AUTO_INCREMENT,
                         user_id INT NOT NULL,
                         description TEXT,
                         full_price DECIMAL(10, 2) NOT NULL,
                         paid_amount DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
                         outstanding_amount DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
                         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                         updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                         PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (full_name) VALUES
                                 ('Александр Пушкин'),
                                 ('Михал Палыч'),
                                 ('Владимир Владимирович'),
                                 ('Дональд Трамп'),
                                 ('Иосиф');

INSERT INTO `order` (user_id, description, full_price, paid_amount, outstanding_amount) VALUES
                                (1, 'Канцелярия', 150.00, 150.00, 0.00),
                                (1, 'Консультации', 200.00, 100.00, 100.00),
                                (2, 'Веб-разработка', 500.00, 300.00, 200.00),
                                (3, 'Маркетинг', 400.00, 0.00, 400.00),
                                (4, 'Лопата', 100.00, 100.00, 0.00),
                                (5, 'Горячее пиво холодные чебуреки', 75.00, 50.00, 25.00);

