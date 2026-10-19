create database semfront;

use semfront;

create table clientes (
    id_cliente int primary key auto_increment,
    nome varchar(255) not null,
    email varchar(255) not null unique
);

create table categorias (
    id_categoria int primary key auto_increment,
    nome varchar(255) not null unique
);

create table produtos (
    id_produto int primary key auto_increment,
    nome varchar(255) not null,
    preco decimal(10, 2) not null,
    estoque int not null default 0,
    id_categoria int,
    foreign key (id_categoria) references categorias (id_categoria) on delete set null on update cascade
);

create table vendas (
    id_venda int primary key auto_increment,
    data_venda timestamp default current_timestamp,
    id_cliente int not null,
    foreign key (id_cliente) references clientes (id_cliente) on delete restrict on update cascade
);

create table item_venda (
    id_item int primary key auto_increment,
    id_venda int not null,
    id_produto int not null,
    quantidade int not null,
    preco_unt decimal(10, 2) not null,
    foreign key (id_venda) references vendas (id_venda) on delete cascade,
    foreign key (id_produto) references produtos (id_produto) on delete restrict
);



-- seeds

-- Categorias
INSERT INTO categorias (nome) VALUES
('Informática'),
('Periféricos'),
('Móveis'),
('Material de Escritório'),
('Armazenamento');

-- Clientes
INSERT INTO clientes (nome, email) VALUES
('Ana Silva', 'ana@email.com'),
('Bruno Santos', 'bruno@email.com'),
('Carla Oliveira', 'carla@email.com'),
('Daniel Costa', 'daniel@email.com'),
('Eduarda Lima', 'eduarda@email.com'),
('Felipe Souza', 'felipe@email.com');

-- Produtos
INSERT INTO produtos (nome, preco, estoque, id_categoria) VALUES
('Notebook', 3500.00, 10, 1),
('Computador Desktop', 2800.00, 8, 1),
('Mouse USB', 45.90, 50, 2),
('Teclado Mecânico', 220.00, 25, 2),
('Monitor 24 polegadas', 899.90, 15, 1),
('Cadeira de Escritório', 650.00, 12, 3),
('Mesa de Escritório', 480.00, 7, 3),
('Caderno', 18.50, 100, 4),
('Caneta Azul', 2.50, 200, 4),
('Pen Drive 64 GB', 39.90, 40, 5),
('HD Externo 1 TB', 399.90, 20, 5),
('Webcam USB', 159.90, 18, 2);

-- Vendas
INSERT INTO vendas (id_cliente, data_venda) VALUES
(1, '2026-10-01 10:30:00'),
(2, '2026-10-02 14:15:00'),
(1, '2026-10-03 09:00:00'),
(3, '2026-10-05 16:45:00'),
(4, '2026-10-07 11:20:00'),
(5, '2026-10-10 13:10:00'),
(2, '2026-10-12 15:30:00'),
(6, '2026-10-15 08:50:00');

-- Itens das vendas
INSERT INTO item_venda
    (id_venda, id_produto, quantidade, preco_unt)
VALUES
-- Venda 1: Ana
(1, 1, 1, 3500.00),
(1, 3, 2, 45.90),
(1, 4, 1, 220.00),

-- Venda 2: Bruno
(2, 5, 2, 899.90),
(2, 3, 1, 45.90),

-- Venda 3: Ana
(3, 10, 3, 39.90),
(3, 9, 10, 2.50),

-- Venda 4: Carla
(4, 6, 1, 650.00),
(4, 7, 1, 480.00),

-- Venda 5: Daniel
(5, 2, 1, 2800.00),
(5, 5, 1, 899.90),
(5, 12, 1, 159.90),

-- Venda 6: Eduarda
(6, 8, 5, 18.50),
(6, 9, 20, 2.50),

-- Venda 7: Bruno
(7, 11, 1, 399.90),
(7, 10, 2, 39.90),

-- Venda 8: Felipe
(8, 1, 1, 3500.00),
(8, 6, 1, 650.00);
