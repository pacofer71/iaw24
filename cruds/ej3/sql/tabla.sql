create table users(
    id int auto_increment primary key,
    username varchar(80) unique not null,
    email varchar(100) unique not null,
    pass varchar(250) not null,
    perfil enum("Admin", "User") default "User"
);
INSERT INTO users (username, email, pass, perfil) VALUES 
('jdoe', 'jdoe@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('asmith', 'asmith@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('bwilliams', 'bwilliams@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('cmartinez', 'cmartinez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('ddavis', 'ddavis@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('esanchez', 'esanchez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('ffernandez', 'ffernandez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('ggarcia', 'ggarcia@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('hrodriguez', 'hrodriguez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('ijimenez', 'ijimenez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('klopez', 'klopez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('mramirez', 'mramirez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('nvasquez', 'nvasquez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User'),
('operez', 'operez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'Admin'),
('qgomez', 'qgomez@example.com', '$2b$12$NCZ4oneTkdzao.nS0IYpw./NbjclcBI.oVFvLiPdpzvmklhy9giFe', 'User');
